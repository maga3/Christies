<?php

namespace model;

class Comentario implements cruddb
{
    protected int $id;
    public string $contenido;
    public string $fecha;
    protected int $id_obj;
    protected int $id_usr;

    /**
     * @param int $id
     * @param string $contenido
     * @param string $fecha
     * @param int $id_obj
     * @param int $id_usr
     */
    public function __construct(int $id, string $contenido, string $fecha, int $id_obj, int $id_usr)
    {
        $this->id = $id;
        $this->contenido = $contenido;
        $this->fecha = $fecha;
        $this->id_obj = $id_obj;
        $this->id_usr = $id_usr;
    }

    /**
     * @return string
     */
    public function getContenido(): string
    {
        return $this->contenido;
    }

    /**
     * @param string $contenido
     * @return Comentario
     */
    public function setContenido(string $contenido): Comentario
    {
        $this->contenido = $contenido;
        return $this;
    }

    /**
     * @return string
     */
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     * @return Comentario
     */
    public function setFecha(string $fecha): Comentario
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdObj(): int
    {
        return $this->id_obj;
    }

    /**
     * @return int
     */
    public function getIdUsr(): int
    {
        return $this->id_usr;
    }


    public function create()
    {
        // TODO: Implement create() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}