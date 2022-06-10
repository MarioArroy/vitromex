<?php
/*
class Connection
{
    // Contenedor Instancia de la clase
    private static $instance = NULL;
   // Constructor privado, previene la creación de objetos vía new
    private function __construct() 
	{
        $this->con = new mysqli("localhost","root","","v");
    }

    
    // Método singleton 
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function query($sql)
	{
        return $this->con->query($sql);
    }
}
*/

$conn = new mysqli ("localhost", "root", "", "v");
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn){
  echo ("Fallo en la conexion de BD");
}

?>