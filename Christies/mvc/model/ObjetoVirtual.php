<?php

namespace model;
//implements \model\cruddb

class ObjetoVirtual
{
    protected int $id;
    public float $precio;
    public string $nombre;
    public string $img1;
    public string $img2;
    public string $img3;
    public float $lat;
    public float $lon;
    protected int $id_cat;

    /**
     * @author martin ruiz
     * @param int $id
     * @param float $precio
     * @param string $nombre
     * @param string $img1
     * @param string $img2
     * @param string $img3
     * @param float $lat
     * @param float $lon
     * @param int $id_cat
     */
    public function __construct(int $id, float $precio, string $nombre, string $img1, $img2, $img3, float $lat, float $lon, int $id_cat)
    {
        $this->id = $id;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->img1 = $img1;
        $this->img2 = $img2 || '';
        $this->img3 = $img3 || '';
        $this->lat = $lat;
        $this->lon = $lon;
        $this->id_cat = $id_cat;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     * @return ObjetoVirtual
     */
    public function setPrecio(float $precio): ObjetoVirtual
    {
        $this->precio = $precio;
        return $this;
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
     * @return ObjetoVirtual
     */
    public function setNombre(string $nombre): ObjetoVirtual
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg1(): string
    {
        return $this->img1;
    }

    /**
     * @param string $img1
     * @return ObjetoVirtual
     */
    public function setImg1(string $img1): ObjetoVirtual
    {
        $this->img1 = $img1;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg2(): string
    {
        return $this->img2;
    }

    /**
     * @param string $img2
     * @return ObjetoVirtual
     */
    public function setImg2(string $img2): ObjetoVirtual
    {
        $this->img2 = $img2;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg3(): string
    {
        return $this->img3;
    }

    /**
     * @param string $img3
     * @return ObjetoVirtual
     */
    public function setImg3(string $img3): ObjetoVirtual
    {
        $this->img3 = $img3;
        return $this;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return ObjetoVirtual
     */
    public function setLat(float $lat): ObjetoVirtual
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     * @return ObjetoVirtual
     */
    public function setLon(float $lon): ObjetoVirtual
    {
        $this->lon = $lon;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdCat(): int
    {
        return $this->id_cat;
    }

    /**
     * @param int $id_cat
     * @return ObjetoVirtual
     */
    public function setIdCat(int $id_cat): ObjetoVirtual
    {
        $this->id_cat = $id_cat;
        return $this;
    }


    public  function create(): bool
    {
        return ChristiesGestorDB::createProduct($this->getNombre(),$this->getPrecio(),$this->getidCat());
    }

    public static function read($id): bool|ObjetoVirtual
    {

        $obj = ChristiesGestorDB::readProduct($id);
        if ($obj instanceof self){
            return $obj;
        }
        return false;
    }

    public function update(): bool
    {
        return ChristiesGestorDB::updateProduct($this->getNombre(),$this->getPrecio(),$this->getidCat());
    }

    public static function delete($id): bool
    {
        return ChristiesGestorDB::deleteProduct($id);
    }
}