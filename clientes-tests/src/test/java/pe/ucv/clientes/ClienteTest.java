package pe.ucv.clientes;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.ValueSource;
import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.TimeoutException;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import java.time.Duration;
import java.util.concurrent.ThreadLocalRandom;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;

class ClienteTest {

    private static final String BASE_URL =
            System.getProperty("base.url", "http://localhost/LABORAT-08/clientes/");
    private static final String PAGINA_REGISTRO = "frmRegistrarcliente.php";

    private WebDriver driver;
    private WebDriverWait wait;

    @BeforeEach
    void abrirNavegador() {
        driver = new ChromeDriver();
        driver.manage().window().maximize();
        wait = new WebDriverWait(driver, Duration.ofSeconds(10));
        driver.get(BASE_URL + "index.php");
    }

    @AfterEach
    void cerrarNavegador() {
        if (driver != null) {
            driver.quit();
        }
    }

    private void abrirFormularioRegistro() {
        driver.findElement(By.linkText("Registrar Nuevo Cliente")).click();
        wait.until(ExpectedConditions.visibilityOfElementLocated(By.name("dni")));
    }

    private void escribir(String campo, String valor) {
        WebElement el = driver.findElement(By.name(campo));
        el.clear();
        el.sendKeys(valor);
    }

    private void llenarFormulario(String dni) {
        escribir("dni", dni);
        escribir("ape", "Perez Garcia");
        escribir("nom", "Juan Carlos");
        escribir("email", "juan.perez@email.com");
        escribir("cel", "987654321");
        escribir("dir", "Av. Principal 123");
    }

    private void guardar() {
        driver.findElement(By.name("btnRegistrar")).click();
    }

    private String mensajeValidacion(String campo) {
        WebElement el = driver.findElement(By.name(campo));
        return (String) ((JavascriptExecutor) driver)
                .executeScript("return arguments[0].validationMessage;", el);
    }

    private void assertSinAlertaDeExito() {
        assertThrows(TimeoutException.class, () ->
                new WebDriverWait(driver, Duration.ofSeconds(2))
                        .until(ExpectedConditions.alertIsPresent()));
    }

    @Test
    @DisplayName("CUP01 - Agregar un cliente sin errores")
    void cup01_registrarClienteValido() {
        String dni = String.valueOf(
                ThreadLocalRandom.current().nextInt(10_000_000, 99_999_999));

        abrirFormularioRegistro();
        llenarFormulario(dni);
        guardar();

        Alert alerta = wait.until(ExpectedConditions.alertIsPresent());
        assertTrue(alerta.getText().contains("fue registrado con"),
                "Mensaje inesperado: " + alerta.getText());
        alerta.accept();

        driver.findElement(By.linkText("Ver Lista de Clientes")).click();
        String tabla = driver.findElement(By.tagName("tbody")).getText();
        assertTrue(tabla.contains(dni), "El cliente no aparece en la lista");
    }

    @ParameterizedTest(name = "CUP02 - campo vacío: {0}")
    @ValueSource(strings = {"dni", "ape", "nom", "email", "cel", "dir"})
    void cup02_datosIncompletos(String campoVacio) {
        abrirFormularioRegistro();
        llenarFormulario("71234567");
        driver.findElement(By.name(campoVacio)).clear();
        guardar();

        assertTrue(driver.getCurrentUrl().endsWith(PAGINA_REGISTRO),
                "El formulario no debía enviarse");
        assertFalse(mensajeValidacion(campoVacio).isEmpty(),
                "No se mostró el aviso de campo obligatorio");
        assertSinAlertaDeExito();
    }

    @Test
    @DisplayName("CUP03 - Email con formato no válido")
    void cup03_emailNoValido() {
        abrirFormularioRegistro();
        llenarFormulario("71234567");
        escribir("email", "juan.perez");
        guardar();

        assertTrue(driver.getCurrentUrl().endsWith(PAGINA_REGISTRO),
                "El formulario no debía enviarse");
        assertFalse(mensajeValidacion("email").isEmpty(),
                "No se mostró el aviso de formato de correo");
        assertSinAlertaDeExito();
    }

    @Test
    @DisplayName("CUP03 - DNI limitado a 8 caracteres")
    void cup03_limiteDni() {
        abrirFormularioRegistro();
        escribir("dni", "712345678");

        String valor = driver.findElement(By.name("dni")).getAttribute("value");
        assertEquals("71234567", valor);
    }
}