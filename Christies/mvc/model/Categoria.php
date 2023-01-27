<?php

namespace model;

/**
 * @author Martin Ruiz
 */
class Categoria implements \model\cruddb
{
    /**
     * @var int|null
     */
    protected ?int $id;
    /**
     * @var string
     */
    public string $nombre;
    /**
     * @var string
     */
    public string $descripcion;
    /**
     * @var string
     */
    public string $img;

    /**
     * @author martin ruiz
     * @param int $id
     * @param string $nombre
     * @param string $descripcion
     * @param string $img
     */
    public function __construct(int $id, string $nombre, string $descripcion, string $img)
    {
        $this->id = $id??null;
        $this->nombre = $nombre ?? '';
        $this->descripcion = $descripcion ??'';
        $this->img = $img ?? '';
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
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @author Martin Ruiz
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @author Martin Ruiz
     * @param string $descripcion
     * @return Categoria
     */
    public function setDescripcion(string $descripcion): Categoria
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @author Martin Ruiz
     * @param string $img
     * @return Categoria
     */
    public function setImg(string $img): Categoria
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function create(): bool
    {
            return ChristiesGestorDB::addCat();
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return Categoria|bool
     */
    public static function read($id): Categoria|bool
    {
        $cat =  ChristiesGestorDB::readCategory($id);
        if ($cat instanceof self){
            return $cat;
        }
        return false;
    }

    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function update(): bool
    {
        return ChristiesGestorDB::updateCat($this->getId(),$this->getNombre(),$this->getDescripcion(),$this->getImg());
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool
     */
    public static function delete($id): bool
    {
        return ChristiesGestorDB::deleteCat($id);
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public static function lastid(): int
    {
        return ChristiesGestorDB::categoriaLastId();
    }
}