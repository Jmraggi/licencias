<?php
require_once("layouts/header.php");
?>

<?php
// Obtener el año actual
$anio_actual = date("Y");

// Obtener los días disponibles de la base de datos para el año actual
$disponibilidad = new Modelo();
$dias_disponibles = $disponibilidad->mostrarDiasDisponibles($anio_actual);
?>

<script>
    // Función para agregar dinámicamente un nuevo conjunto de campos al formulario
    function agregarOpcion() {
        // Clonar el primer conjunto de campos
        var nuevoOpcion = document.getElementById('opcion').cloneNode(true);
        
        // Reiniciar los valores de los campos clonados
        nuevoOpcion.querySelector('[name="fecha_inicio"]').value = '';
        nuevoOpcion.querySelector('[name="fecha_fin"]').value = '';
        nuevoOpcion.querySelector('[name="cantidad_dias"]').value = '';
        nuevoOpcion.querySelector('[name="mes_dias"]').value = '';
        nuevoOpcion.querySelector('[name="anio"]').value = '';

        // Obtener el nodo del botón "Agregar otra solicitud de licencia"
        var botonAgregar = document.getElementById('boton-agregar');

        // Insertar el conjunto clonado antes del botón "Agregar otra solicitud de licencia"
        document.getElementById('form-container').insertBefore(nuevoOpcion, botonAgregar);
    }
</script>


<h1 class="text-center">Agregar licencia</h1>

<?php if (!empty($dias_disponibles)): ?>
    <form action="" method="get" id="form-container">
        <!-- Mostrar los campos del formulario para agregar una solicitud de licencia -->
        <div id="opcion">
            <div class="campos-opcion">
                <input type="date" name="fecha_inicio" placeholder="Fecha de inicio">
                <input type="date" name="fecha_fin" placeholder="Fecha de fin">
                <input type="number" name="cantidad_dias" placeholder="Cantidad de días" value="<?php echo $dias_disponibles; ?>" >
                <input type="text" name="mes_dias" placeholder="Mes de días">
                <input type="text" name="anio" placeholder="Año">
            </div>
        </div>
        <button type="button" id="boton-agregar" onclick="agregarOpcion()">Agregar otra solicitud de licencia</button>

        <br><br>
        <input type="submit" class="btn" name="btn" value="GUARDAR">
        <br>
        <input type="hidden" name="m" value="guardar">
        <br>
        <a href="index.php" class="btn">Volver</a>
    </form>
<?php else: ?>
    <p>No tiene días disponibles</p>
<?php endif; ?>

<style>
    .campos-opcion {
        display: inline-block;
        margin-bottom: 10px;
    }
</style>

<?php
require_once("layouts/footer.php");
?>
