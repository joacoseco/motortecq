<?php


class Vehiculo
{
private $patente;
private $marca;
private $modelo;
private $año;
private $cliente;

    /**
     * Vehiculo constructor.
     * @param $patente
     * @param $marca
     * @param $modelo
     * @param $año
     * @param $cliente
     */
    public function __construct($patente, $marca, $modelo, $año, $cliente)
    {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
        $this->cliente = $cliente;
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
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * @param mixed $año
     */
    public function setAño($año)
    {
        $this->año = $año;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }




}