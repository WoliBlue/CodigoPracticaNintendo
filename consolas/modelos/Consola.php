<?php

// Esta clase representa una consola

class Consola
{
    // Variables de clase
    private $ID, $nombre, $descripcion, $año;

    // Constructor
    public function __construct($nID, $nnombre, $ndescripcion, $naño)
    {
        $this->ID = $nID;
        $this->nombre = $nnombre;
        $this->descripcion = $ndescripcion;
        $this->año = $naño;
    }

    // Muestra los datos de la consola
    public function toString()
    {
        return
            [
                "ID" => utf8_encode($this->ID),
                "nombre" => utf8_encode($this->nombre),
                "descripcion" => utf8_encode($this->descripcion),
                "año" => utf8_encode($this->año)
            ];
    }
}