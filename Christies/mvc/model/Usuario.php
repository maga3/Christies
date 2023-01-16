<?php

namespace model;

class Usuario implements cruddb
{
    protected int $id;
    public string $email;
    public string $password;
    public string $rol;
    public float $tokens;
    public string $tlf;

    /**
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Usuario
     */
    public function setEmail(string $email): Usuario
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Usuario
     */
    public function setPassword(string $password): Usuario
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * @param string $rol
     * @return Usuario
     */
    public function setRol(string $rol): Usuario
    {
        $this->rol = $rol;
        return $this;
    }

    /**
     * @return float
     */
    public function getTokens(): float
    {
        return $this->tokens;
    }

    /**
     * @param float $tokens
     * @return Usuario
     */
    public function setTokens(float $tokens): Usuario
    {
        $this->tokens = $tokens;
        return $this;
    }

    /**
     * @return string
     */
    public function getTlf(): string
    {
        return $this->tlf;
    }

    /**
     * @param string $tlf
     * @return Usuario
     */
    public function setTlf(string $tlf): Usuario
    {
        $this->tlf = $tlf;
        return $this;
    }


    public function create(): bool
    {
        return ChristiesGestorDB::addUser($this->getEmail(),$this->getPassword(),$this->getTlf());
    }

    public function read()
    {
        // TODO: Implement read() method.

    }

    public function update(): bool
    {
        return ChristiesGestorDB::updateUser($this->getId(),$this->getEmail(),$this->getTokens(),$this->getTlf());
    }

    public function delete(): bool
    {
        return ChristiesGestorDB::deleteUser($this->getId());
    }
}