<?php
require_once("layouts/header.php");
?>
<h1 class="text-center">Agregar disponibilidad</h1>
<form action="" method="get">
    <input type="hidden" name="anio" value="2024"> <!-- Año fijo -->
    <input type="text" value="2024" readonly> <br>
    <input type="text" placeholder="INGRESE La cantidad:" name="cantidad"> <br>
    <label for="feria">A que  feria corresponde?:</label> <br>
    <select id="feria" name="feria">
        <option value="Enero">Enero</option>
        <option value="Julio">Julio</option>
    </select> <br>
    <label for="tipo">Que tipo de tipo es:</label> <br>
    <select id="opcion" name="tipo">
        <option value="Corridos">Corridos</option>
        <option value="opcion2">Habiles</option>
    </select> <br> <br>
    <input type="submit" class="btn" name="btn" value="GUARDAR"> <br>
    <input type="hidden" name="m" value="guardar"> <br>
    <a href="index.php" class="btn">Volver</a>
</form>

<?php
require_once("layouts/footer.php");