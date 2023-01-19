<?php

namespace model;

class Compras implements cruddb
{
    protected int $id;
    public string $fecha;
    protected int $id_obj;
    protected int $id_user;

    /**
     * @param int $id
     * @param string $fecha
     * @param int $id_obj
     * @param int $id_user
     */
    public function __construct(int $id, string $fecha, int $id_obj, int $id_user)
    {
        $this->id = $id || '';
        $this->fecha = $fecha || '';
        $this->id_obj = $id_obj;
        $this->id_user = $id_user;
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
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     * @return Compras
     */
    public function setFecha(string $fecha): Compras
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdObj(): int
    {
        return $this->id_obj;
    }

    /**
     * @param int $id_obj
     * @return Compras
     */
    public function setIdObj(int $id_obj): Compras
    {
        $this->id_obj = $id_obj;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     * @return Compras
     */
    public function setIdUser(int $id_user): Compras
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function create()
    {
        return ChristiesGestorDB::createCompra($this->getIdObj(),$this->getIdUser());
    }

    public static function read($id)
    {
        $compra = ChristiesGestorDB::readCompra($id);
        if($compra instanceof self) {
            return $compra;
        }
        return false;
    }

    public function update()
    {
        return ChristiesGestorDB::updateCompra();
    }

    public static function delete($id)
    {
        return ChristiesGestorDB::deleteCompra($id);
    }
}