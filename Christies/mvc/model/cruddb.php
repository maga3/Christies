<?php

namespace model;

interface cruddb {
    public static function create();
    public static function read();
    public static function update();
    public static function delete();
}
