<?php

namespace model;

class Categoria
{
    protected int $id;
    public string $nombre;
    public string $descripcion;
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
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Categoria
     */
    public function setDescripcion(string $descripcion): Categoria
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     * @return Categoria
     */
    public function setImg(string $img): Categoria
    {
        $this->img = $img;
        return $this;
    }

}