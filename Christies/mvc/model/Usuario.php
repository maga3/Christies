<?php

namespace model;

/**
 * @author Martin Ruiz
 */
class Usuario implements cruddb
{
    /**
     * @author Martin Ruiz
     * @var int
     */
    protected int $id;
    /**
     * @author Martin Ruiz
     * @var string
     */
    protected string $email;
    /**
     * @author Martin Ruiz
     * @var string
     */
    public string $password;
    /**
     * @author Martin Ruiz
     * @var string
     */
    public string $rol;
    /**
     * @author Martin Ruiz
     * @var float
     */
    public float $tokens;
    /**
     * @author Martin Ruiz
     * @var string
     */
    public string $tlf;

    /**
     * @author Martin Ruiz
     * @author martin ruiz
     * @param int $id
     * @param string $email
     * @param string $password
     * @param string $rol
     * @param float $tokens
     * @param string $tlf
     */
    public function __construct(int $id, string $email, string $password, string $rol, float $tokens, string $tlf)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->tokens = $tokens;
        $this->tlf = $tlf;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @author Martin Ruiz
     * @param string $email
     * @return Usuario
     */
    public function setEmail(string $email): Usuario
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @author Martin Ruiz
     * @param string $password
     * @return Usuario
     */
    public function setPassword(string $password): Usuario
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * @author Martin Ruiz
     * @param string $rol
     * @return Usuario
     */
    public function setRol(string $rol): Usuario
    {
        $this->rol = $rol;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return float
     */
    public function getTokens(): float
    {
        return $this->tokens;
    }

    /**
     * @author Martin Ruiz
     * @param float $tokens
     * @return Usuario
     */
    public function setTokens(float $tokens): Usuario
    {
        $this->tokens = $tokens;
        return $this;
    }

    /**
     * @author Martin Ruiz
     * @return string
     */
    public function getTlf(): string
    {
        return $this->tlf;
    }

    /**
     * @author Martin Ruiz
     * @param string $tlf
     * @return Usuario
     */
    public function setTlf(string $tlf): Usuario
    {
        $this->tlf = $tlf;
        return $this;
    }


    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function create(): bool
    {
        return ChristiesGestorDB::addUser($this->getEmail(),$this->getPassword(),$this->getTlf());
    }

    /**
     * @param $id
     * @return Usuario|false
     * @author Martin Ruiz
     */
    public static function read($id):Usuario|false
    {
        $user = ChristiesGestorDB::readUser($id);
        if ($user instanceof self){
            return $user;
        }
        return false;
    }

    /**
     * @author Martin Ruiz
     * @return bool
     */
    public function update(): bool
    {
        return ChristiesGestorDB::updateUser($this->getId(),$this->getEmail(),$this->getTokens(),$this->getTlf());
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool
     */
    public static function delete($id): bool
    {
        return ChristiesGestorDB::deleteUser($id);
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public static function lastid(): int
    {
        return ChristiesGestorDB::userLastId();
    }
}