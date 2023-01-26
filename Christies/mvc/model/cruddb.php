<?php

namespace model;

/**
 * @author Martin Ruiz
 */
interface cruddb {
    /**
     * @author Martin Ruiz
     * @return mixed
     */
    public function create(): mixed;

    /**
     * @author Martin Ruiz
     * @param $id
     * @return mixed
     */
    public static function read($id): mixed;

    /**
     * @author Martin Ruiz
     * @return mixed
     */
    public function update(): mixed;

    /**
     * @author Martin Ruiz
     * @param $id
     * @return mixed
     */
    public static function delete($id): mixed;

    /**
     * @author Martin Ruiz
     * @return mixed
     */
    public static function lastid();
}
