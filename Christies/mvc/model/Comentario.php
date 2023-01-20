<?php

namespace model;

class Comentario implements cruddb
{
    protected int $id;
    public string $contenido;
    public string $fecha;
    protected ObjetoVirtual $id_obj;
    protected Usuario $id_usr;

    /**
     * @param int $id
     * @param string $contenido
     * @param string $fecha
     * @param ObjetoVirtual $id_obj
     * @param Usuario $id_usr
     */
    public function __construct(int $id, string $contenido, string $fecha, ObjetoVirtual $id_obj, Usuario $id_usr)
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
     * @return ObjetoVirtual
     */
    public function getObj(): ObjetoVirtual
    {
        return $this->id_obj;
    }

    /**
     * @return Usuario
     */
    public function getUsr(): Usuario
    {
        return $this->id_usr;
    }


    public function create()
    {
        ChristiesGestorDB::createComment($this->getContenido(), $this->getObj()->getId(), $this->getUsr()->getId());
    }

    public static function read($id)
    {
        $comment = ChristiesGestorDB::readComment($id);
        if ($comment instanceof self){
            return $comment;
        }
        return false;
    }

    public function update()
    {
        ChristiesGestorDB::updateComment($this->getId(), $this->getContenido());
    }

    public static function delete($id)
    {
        ChristiesGestorDB::deleteComment($id);
    }

    public static function lastid()
    {
        // TODO: Implement lastid() method.
    }
}