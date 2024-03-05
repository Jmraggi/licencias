<?php
require_once("layouts/header.php");
?>
<a href="index.php?m=nuevo" class="btn">NUEVO</a>
<a href="index.php?m=pedirDias" class="btn">Pedir días</a>
<table>
    <tr>
        <td>ID</td>
        <td>Año</td>
        <td>Cantidad</td> 
        <td>ID</td>
        <td>NOMBRE</td>
        <td>ACCIÓN</td>         
    </tr>
    <tbody>
        <?php if(is_array($dato) && count($dato) > 0): ?>
            <?php foreach($dato as $v): ?>
                <tr>
                    <td><?php echo $v['id'] ?> </td>
                    <td><?php echo $v['anio'] ?> </td>
                    <td><?php echo $v['cantidad'] ?> </td>
                    <td><?php echo $v['nombre'] ?> </td>
                    <td>
                        <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
                        <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('ESTA SEGURO');">ELIMINAR</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">NO HAY REGISTROS</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php
require_once("layouts/footer.php");
?>
