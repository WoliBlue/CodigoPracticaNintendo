<?php

require_once('datos/ConexionBD.php');
require_once('utilidades/ExcepcionApi.php');
require_once('datos/mensajes.php');

// Esta clase representa un controlador para las consolas
class ControladorConsolas
{
    // Nombres de la tabla y de los atributos
    const NOMBRE_TABLA = "consola";
    const ID = "ID";
    const NOMBRE = "nombre";
    const DESCRIPCION = "descripcion";
    const ANIO = "año";

    /**
     * Descripción: Obtiene los datos de todas las consolas que hay en el sistema
     * @return Datos de todas las consolas que hay en el sistema
     */
    public function obtenerTodasConsolas()
    {
        try 
        {
            $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

            // Sentencia SELECT
            $comando = "SELECT * FROM " . self::NOMBRE_TABLA;

            $sentencia = $pdo->prepare($comando);

            $sentencia->execute();

            $array = array();

            while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) 
            { 
                array_push($array, $row);
            }

            return [
                [
                    "estado" => ESTADO_CREACION_EXITOSA,
                    "mensaje" => $array
                ]
            ];
        } 
        catch (PDOException $e) 
        {
            throw new ExcepcionApi(ESTADO_ERROR_BD, $e->getMessage());
        }
    }

    /**
     * Descripción: Obtiene y devuelve una consola según su ID
     * @param ID ID de la consola
     * @return Datos de la consola indicada con su ID
     */
    public function obtenerConsolaPorID($ID)
    {
        try 
        {
            $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

            // Sentencia SELECT
            $comando = "SELECT * FROM " . self::NOMBRE_TABLA . " " .
            "WHERE " . self::ID . " = ?";

            $sentencia = $pdo->prepare($comando);

            // Pongo los datos en la consulta SELECT
            $sentencia->bindParam(1, $ID);

            $sentencia->execute();

            $array = array();

            while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) 
            { 
                array_push($array, $row);
            }

            return [
                [
                    "estado" => ESTADO_CREACION_EXITOSA,
                    "mensaje" => $array
                ]
            ];
        } 
        catch (PDOException $e) 
        {
            throw new ExcepcionApi(ESTADO_ERROR_BD, $e->getMessage());
        }
    }

    /**
     * Descripción: Inserta una consola en la base de datos
     * @param consola Consola para insertar en la base de datos
     * @return Indica si se ha insertado la consola correctamente (Código 1)
     */
    public function insertarConsola($consola)
    {
        try 
        {
            // Obtengo una instancia de la base de datos ya conectada
            $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

            // Creo la sentencia INSERT
            $comando = "INSERT INTO " . self::NOMBRE_TABLA . " ( " .
                self::NOMBRE . "," .
                self::DESCRIPCION . "," .
                self::ANIO . ")" .
                " VALUES(?,?,?)";

            $sentencia = $pdo->prepare($comando);

            // Pongo los datos en la consulta INSERT
            $sentencia->bindParam(1, $consola->nombre);
            $sentencia->bindParam(2, $consola->descripcion);
            $sentencia->bindParam(3, $consola->anio);

            // Ejecuto la consulta
            $resultado = $sentencia->execute();
        } 
        catch (PDOException $e) 
        {
            throw new ExcepcionApi(self::ESTADO_ERROR_BD, $e->getMessage());
        }

        if ($resultado) 
        {
            http_response_code(200);
            return [
                "estado" => ESTADO_CREACION_EXITOSA,
                "mensaje" => "Consola insertada correctamente."
            ];
        } else 
        {
            throw new ExcepcionApi(ESTADO_CREACION_FALLIDA, "Ha ocurrido un error al insertar la consola.");
        }
    }
}
?>