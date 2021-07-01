<?php

class inicioController
{
    public function index () {
        require_once 'layout/header.php';
        require_once 'layout/sidebar.php';
        require_once 'views/inicio/index.php';
    }
}