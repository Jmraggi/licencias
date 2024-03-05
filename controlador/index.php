<?php
require_once("modelo/index.php");

class modeloController{
    private $model;

    public function __construct(){
        $this->model = new Modelo();
    }

    static function index(){
        $anio = date('Y');
        $disponibilidad = new Modelo();
        $dato = $disponibilidad->mostrarDiasDisponibles($anio);
        if($dato !== false && !empty($dato)) {
            require_once("vista/index.php");
        } else {
            echo "Error al obtener los datos de disponibilidad.";
        }
    }
    
    static function nuevo(){        
        require_once("vista/nuevo.php");
    }

    static function pedirDias(){        
        require_once("vista/pedir_dias.php");
    }

    static function guardar(){
        $anio = $_POST['anio'];
        $cantidad = $_POST['cantidad'];
        $feria = $_POST['feria'];
        $tipo = $_POST['tipo'];
        $data = "'".$anio."','".$cantidad."','".$feria."','".$tipo."'";
        $disponibilidad = new Modelo();
        $dato = $disponibilidad->insertar("disponibilidad", $data);
        if ($dato) {
            header("location:index.php");
        } else {
            echo "Error al guardar los datos"; // Muestra un mensaje de error si la inserción falla
        }
    }


    // Método estático para mostrar el formulario de edición de un registro
    static function editar(){    
        $id = $_REQUEST['id'];
        $disponibilidad = new Modelo(); // Se crea una instancia de la clase Modelo
        $dato = $disponibilidad->mostrar("disponibilidad","id=".$id); // Se obtienen los datos del disponibilidad con el id especificado
        require_once("vista/editar.php"); // Se incluye la vista correspondiente
    }

    // Método estático para actualizar un registro
    static function actualizar(){
        // Se obtienen los datos enviados por el formulario
        $id = $_REQUEST['id'];
        $anio= $_REQUEST['anio'];
        $cantidad= $_REQUEST['cantidad'];
        $feria= $_REQUEST['feria'];
        $tipo= $_REQUEST['tipo'];
        $data = "anio='".$anio."',cantidad=".$cantidad.",feria='".$feria."',tipo='".$tipo."'";
        $disponibilidad = new Modelo(); // Se crea una instancia de la clase Modelo
        $dato = $disponibilidad->actualizar("disponibilidad",$data,"id=".$id); // Se actualizan los datos del disponibilidad con el id especificado
        header("location:".urlsite); // Se redirige a la página principal
    }

    // Método estático para eliminar un registro
    static function eliminar(){    
        $id = $_REQUEST['id'];
        $disponibilidad = new Modelo(); // Se crea una instancia de la clase Modelo
        $dato = $disponibilidad->eliminar("disponibilidad","id=".$id); // Se elimina el disponibilidad con el id especificado
        header("location:".urlsite); // Se redirige a la página principal
    }
}
?>
