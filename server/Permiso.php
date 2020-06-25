<?php


class Permiso
{
private $idPermiso;
private $nombre;

    /**
     * Permiso constructor.
     * @param $idPermiso
     * @param $nombre
     */
    public function __construct($idPermiso, $nombre)
    {
        $this->idPermiso = $idPermiso;
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getIdPermiso()
    {
        return $this->idPermiso;
    }

    /**
     * @param mixed $idPermiso
     */
    public function setIdPermiso($idPermiso)
    {
        $this->idPermiso = $idPermiso;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }




}