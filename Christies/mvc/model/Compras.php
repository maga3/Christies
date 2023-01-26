<?php

namespace model;

/**
 * @author Martin Ruiz
 */
class Compras
{
    /**
     * @author Martin Ruiz
     * @var int|bool
     */
    protected int $id;
    /**
     * @author Martin Ruiz
     * @var string|bool
     */
    public string $fecha;
    /**
     * @author Martin Ruiz
     * @var int
     */
    protected int $id_obj;
    /**
     * @author Martin Ruiz
     * @var int
     */
    protected int $id_user;

    /**
     * @author Martin Ruiz
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
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @author Martin Ruiz
     * @param string $fecha
     * @return Compras
     */
    public function setFecha(string $fecha): Compras
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public function getIdObj(): int
    {
        return $this->id_obj;
    }

    /**
     * @author Martin Ruiz
     * @param int $id_obj
     * @return Compras
     */
    public function setIdObj(int $id_obj): Compras
    {
        $this->id_obj = $id_obj;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @author Martin Ruiz
     * @param int $id_user
     * @return Compras
     */
    public function setIdUser(int $id_user): Compras
    {
        $this->id_user = $id_user;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function create(): bool
    {
        return ChristiesGestorDB::createCompra($this->getIdObj(),$this->getIdUser());
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return false|Compras
     */
    public static function read($id): Compras|bool
    {
        $compra = ChristiesGestorDB::readCompra($id);
        if($compra instanceof self) {
            return $compra;
        }
        return false;
    }

    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function update(): bool
    {
        return ChristiesGestorDB::updateCompra();
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool
     */
    public static function delete($id): bool
    {
        return ChristiesGestorDB::deleteCompra($id);
    }
}