<?php


class Reserva
{
private $idDisponibilidad;
private $rutCliente;
private $tipoServicio;
    private $motivo;
private $estado;

    /**
     * Reserva constructor.
     * @param $idDisponibilidad
     * @param $rutCliente
     * @param $tipoServicio
     * @param $motivo
     * @param $estado
     */
    public function __construct($idDisponibilidad, $rutCliente, $tipoServicio, $motivo, $estado)
    {
        $this->idDisponibilidad = $idDisponibilidad;
        $this->rutCliente = $rutCliente;
        $this->tipoServicio = $tipoServicio;
        $this->motivo = $motivo;
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdDisponibilidad()
    {
        return $this->idDisponibilidad;
    }

    /**
     * @param mixed $idDisponibilidad
     */
    public function setIdDisponibilidad($idDisponibilidad)
    {
        $this->idDisponibilidad = $idDisponibilidad;
    }

    /**
     * @return mixed
     */
    public function getRutCliente()
    {
        return $this->rutCliente;
    }

    /**
     * @param mixed $rutCliente
     */
    public function setRutCliente($rutCliente)
    {
        $this->rutCliente = $rutCliente;
    }

    /**
     * @return mixed
     */
    public function getTipoServicio()
    {
        return $this->tipoServicio;
    }

    /**
     * @param mixed $tipoServicio
     */
    public function setTipoServicio($tipoServicio)
    {
        $this->tipoServicio = $tipoServicio;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


}