<?php

namespace model;

/**

 * * @author martin ruiz
 */
class ObjetoVirtual implements cruddb
{
    /**
     * @var int
     * * @author martin ruiz
     */
    protected int $id;
    /**
     * @var float
     * * @author martin ruiz
     */
    public float $precio;
    /**
     * @var string
     * * @author martin ruiz
     */
    public string $nombre;
    /**
     * @var string
     * * @author martin ruiz
     */
    public string $img1;
    /**
     * @var string
     * * @author martin ruiz
     */
    public string $img2;
    /**
     * @var string
     * * @author martin ruiz
     */
    public string $img3;
    /**
     * @var float
     * * @author martin ruiz
     */
    public float $lat;
    /**
     * @var float
     * * @author martin ruiz
     */
    public float $lon;
    /**
     * @var int
     * * @author martin ruiz
     */
    protected int $id_cat;

    /**
     * @param int $id
     * @param float $precio
     * @param string $nombre
     * @param string $img1
     * @param string $img2
     * @param string|null $img3
     * @param float $lat
     * @param float $lon
     * @param int $id_cat
     * @author martin ruiz
     */
    public function __construct(int $id, float $precio, string $nombre, string $img1, string $img2, ?string $img3, float $lat, float $lon, int $id_cat)
    {
        $this->id = $id ?? null;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->img1 = $img1;
        $this->img2 = $img2 ?? '';
        $this->img3 = $img3 ?? '';
        $this->lat = $lat ?? 0.0;
        $this->lon = $lon ?? 0.0;
        $this->id_cat = $id_cat;
    }

    /**
     * @return int
     * * @author martin ruiz
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     * * @author martin ruiz
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setPrecio(float $precio): ObjetoVirtual
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return string
     * * @author martin ruiz
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setNombre(string $nombre): ObjetoVirtual
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     * * @author martin ruiz
     */
    public function getImg1(): string
    {
        return $this->img1;
    }

    /**
     * @param string $img1
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setImg1(string $img1): ObjetoVirtual
    {
        $this->img1 = $img1;
        return $this;
    }

    /**
     * @return string
     * * @author martin ruiz
     */
    public function getImg2(): string
    {
        return $this->img2;
    }

    /**
     * @param string $img2
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setImg2(string $img2): ObjetoVirtual
    {
        $this->img2 = $img2;
        return $this;
    }

    /**
     * @return string
     * * @author martin ruiz
     */
    public function getImg3(): string
    {
        return $this->img3;
    }

    /**
     * @param string $img3
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setImg3(string $img3): ObjetoVirtual
    {
        $this->img3 = $img3;
        return $this;
    }

    /**
     * @return float
     * * @author martin ruiz
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setLat(float $lat): ObjetoVirtual
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float
     * * @author martin ruiz
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setLon(float $lon): ObjetoVirtual
    {
        $this->lon = $lon;
        return $this;
    }

    /**
     * @return int
     * * @author martin ruiz
     */
    public function getIdCat(): int
    {
        return $this->id_cat;
    }

    /**
     * @param int $id_cat
     * @return ObjetoVirtual
     * * @author martin ruiz
     */
    public function setIdCat(int $id_cat): ObjetoVirtual
    {
        $this->id_cat = $id_cat;
        return $this;
    }

    /**
     * @param $id_usr
     * @return bool
     * * @author martin ruiz
     */
    public function compra($id_usr): bool
    {
        $usr = ChristiesGestorDB::readUser($id_usr);
        if($usr->getTokens() >= $this->getPrecio()){
            if(ChristiesGestorDB::createCompra($this->getId(),$id_usr)){
                $usr->setTokens($usr->getTokens()-$this->getPrecio());
                $usr->update();
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     * * @author martin ruiz
     */
    public function create(): bool
    {
        return ChristiesGestorDB::createProduct($this->getNombre(), $this->getPrecio(), $this->getidCat());
    }

    /**
     * @param $id
     * @return bool|ObjetoVirtual
     * * @author martin ruiz
     */
    public static function read($id): bool|ObjetoVirtual
    {

        $obj = ChristiesGestorDB::readProduct($id);
        if ($obj instanceof self) {
            return $obj;
        }
        return false;
    }

    /**
     * @return bool
     * * @author martin ruiz
     */
    public function update(): bool
    {
        return ChristiesGestorDB::updateProduct($this->getNombre(), $this->getPrecio(), $this->getImg1(), $this->getImg2(), $this->getImg3(), $this->getId(), $this->getLat(), $this->getLon());
    }

    /**
     * @param $id
     * @return bool
     * * @author martin ruiz
     */
    public static function delete($id): bool
    {
        return ChristiesGestorDB::deleteProduct($id);
    }

    /**
     * @return void
     */
    public static function lastid()
    {
        // TODO: Implement lastid() method.
    }
}