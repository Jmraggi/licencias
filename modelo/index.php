<?php
class Modelo{
    private $Modelo; // Variable para almacenar los datos del modelo (no parece ser utilizada)
    private $db; // Variable para almacenar la conexión a la base de datos
    private $datos; // Variable para almacenar los datos obtenidos de las consultas

    public function __construct(){
        $this->Modelo = array(); // Inicializa la variable $Modelo como un array vacío (no parece ser utilizada)
        
        // Establece la conexión a la base de datos utilizando PDO
        // Utiliza 'localhost' como servidor, 'mvc' como nombre de la base de datos
        // y "root" como nombre de usuario y contraseña (no es recomendable tener la contraseña en blanco en producción)
        $this->db = new PDO('mysql:host=localhost;dbname=mvc',"root","");
    }

    

    public function insertar($tabla, $data){
        // Crea la consulta para insertar datos en la tabla especificada con los valores especificados en $data
        $consulta = "INSERT INTO ".$tabla." VALUES (null, ".$data.")"; // Ajusta la consulta SQL según tu estructura de base de datos y los valores proporcionados
        
        // Ejecuta la consulta
        $resultado = $this->db->query($consulta);
        
        // Verifica si la consulta se ejecutó correctamente y devuelve true o false
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrarDiasDisponibles($anio) {
        // Consulta para seleccionar la cantidad de días disponibles para un año específico
        $consulta = "SELECT cantidad FROM disponibilidad WHERE anio = :anio";
        // Prepara la consulta
        $stmt = $this->db->prepare($consulta);
        // Vincula el parámetro :anio con el valor de la variable $anio
        $stmt->bindParam(':anio', $anio, PDO::PARAM_INT);
        // Ejecuta la consulta
        $stmt->execute();
        
        // Obtiene el resultado
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verifica si se obtuvo la fila y si tiene el campo 'cantidad'
        if ($fila && isset($fila['cantidad'])) {
            return $fila['cantidad']; // Retorna la cantidad de días disponibles
        } else {
            return 0; // Si no se encuentra la cantidad de días disponibles, retorna 0 o el valor que consideres apropiado
        }
    }
    

    public function mostrar($tabla,$condicion){
        // Crea la consulta para seleccionar datos de la tabla especificada con la condición especificada
        $consul="select * from ".$tabla." where ".$condicion.";";
        // Ejecuta la consulta
        $resu=$this->db->query($consul);        
        // Almacena los datos obtenidos de la consulta en la variable $datos
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[]=$filas;
        }
        // Devuelve los datos obtenidos
        return $this->datos;
    } 

    public function actualizar($tabla, $data, $condicion){       
        // Crea la consulta para actualizar datos en la tabla especificada con los valores especificados en $data y la condición especificada
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        // Ejecuta la consulta
        $resultado=$this->db->query($consulta);
        // Verifica si la consulta se ejecutó correctamente y devuelve true o false
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }

    public function eliminar($tabla, $condicion){
        // Crea la consulta para eliminar datos de la tabla especificada con la condición especificada
        $eli="delete from ".$tabla." where ".$condicion;
        // Ejecuta la consulta
        $res=$this->db->query($eli);
        // Verifica si la consulta se ejecutó correctamente y devuelve true o false
        if ($res) {
            return true; 
        }else {
            return false;
        }
    }
}
?>
