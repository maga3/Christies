<?php

namespace model;

interface cruddb {
    public function create();
    public function read();
    public function update();
    public function delete();
}
