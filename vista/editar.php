<?php
require_once("layouts/header.php");
?>
<h1 class="text-center">EDITAR</h1>
<form action="" method="get">
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
</form>

<?php
require_once("layouts/footer.php");