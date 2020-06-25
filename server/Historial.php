<?php


class Historial
{
private $patente;
private $fechaRecibo;
private $fechaEntrega;
private $descripcionTrabajo;
private $precio;
private $trabajador;

    /**
     * Historial constructor.
     * @param $patente
     * @param $fechaRecibo
     * @param $fechaEntrega
     * @param $descripcionTrabajo
     * @param $precio
     * @param $trabajador
     */
    public function __construct($patente, $fechaRecibo, $fechaEntrega, $descripcionTrabajo, $precio, $trabajador)
    {
        $this->patente = $patente;
        $this->fechaRecibo = $fechaRecibo;
        $this->fechaEntrega = $fechaEntrega;
        $this->descripcionTrabajo = $descripcionTrabajo;
        $this->precio = $precio;
        $this->trabajador = $trabajador;
    }

    /**
     * @return mixed
     */
    public function getPatente()
    {
        return $this->patente;
    }

    /**
     * @param mixed $patente
     */
    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    /**
     * @return mixed
     */
    public function getFechaRecibo()
    {
        return $this->fechaRecibo;
    }

    /**
     * @param mixed $fechaRecibo
     */
    public function setFechaRecibo($fechaRecibo)
    {
        $this->fechaRecibo = $fechaRecibo;
    }

    /**
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * @param mixed $fechaEntrega
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

    /**
     * @return mixed
     */
    public function getDescripcionTrabajo()
    {
        return $this->descripcionTrabajo;
    }

    /**
     * @param mixed $descripcionTrabajo
     */
    public function setDescripcionTrabajo($descripcionTrabajo)
    {
        $this->descripcionTrabajo = $descripcionTrabajo;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * @param mixed $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }


}