<?php

namespace model;

/**
 * @author Martin Ruiz
 */
class Comentario implements cruddb
{
    /**
     * @author Martin Ruiz
     * @var int|null
     */
    protected ?int $id;
    /**
     * @author Martin Ruiz
     * @var string
     */
    public string $contenido;
    /**
     * @author Martin Ruiz
     * @var string
     */
    public string $fecha;
    /**
     * @author Martin Ruiz
     * @var ObjetoVirtual
     */
    protected ObjetoVirtual $id_obj;
    /**
     * @author Martin Ruiz
     * @var Usuario
     */
    protected Usuario $id_usr;

    /**
     * @author Martin Ruiz
     * @param int $id
     * @param string $contenido
     * @param string $fecha
     * @param ObjetoVirtual $id_obj
     * @param Usuario $id_usr
     */
    public function __construct(int $id, string $contenido, string $fecha, ObjetoVirtual $id_obj, Usuario $id_usr)
    {
        $this->id = $id ?? NULL;
        $this->contenido = $contenido;
        $this->fecha = $fecha ?? '';
        $this->id_obj = $id_obj;
        $this->id_usr = $id_usr;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getContenido(): string
    {
        return $this->contenido;
    }

    /**
     * @author Martin Ruiz
     * @param string $contenido
     * @return Comentario
     */
    public function setContenido(string $contenido): Comentario
    {
        $this->contenido = $contenido;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @author Martin Ruiz
     * @param string $fecha
     * @return Comentario
     */
    public function setFecha(string $fecha): Comentario
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @author Martin Ruiz
     * @return ObjetoVirtual
     */
    public function getObj(): ObjetoVirtual
    {
        return $this->id_obj;
    }

    /**
     * @author Martin Ruiz
     * @return Usuario
     */
    public function getUsr(): Usuario
    {
        return $this->id_usr;
    }


    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function create(): bool
    {
        return ChristiesGestorDB::createComment($this->getContenido(), $this->getObj()->getId(), $this->getUsr()->getId());
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return false|Comentario
     */
    public static function read($id):false|Comentario
    {
        $comment = ChristiesGestorDB::readComment($id);
        if ($comment instanceof self){
            return $comment;
        }
        return false;
    }

    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function update():bool
    {
        return ChristiesGestorDB::updateComment($this->getId(), $this->getContenido());
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool
     */
    public static function delete($id):bool
    {
        return ChristiesGestorDB::deleteComment($id);
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public static function lastid()
    {
        // TODO: Implement lastid() method.
    }
}