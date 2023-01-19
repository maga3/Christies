<?php

namespace model;

interface cruddb {
    public function create();
    public static function read($id);
    public function update();
    public static function delete($id);
}
