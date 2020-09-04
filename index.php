<?php

    session_start();
    
    define('INCLUDE_PATH', 'http://localhost/tinder-backend-PHP/');

    $autoLoad = function ($class){
        include($class.'.php');
    };

    spl_autoload_register($autoLoad);

    if (!isset($_SESSION['login']) && $_GET['url'] != 'login') {
        header('Location: '.INCLUDE_PATH.'login');
        die();
    }

    $url = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'home';

    if (file_exists('pages/'.$url.'.php')) {
        include('pages/'.$url.'.php');
    }else{
        die("Esta página não existe!");
    }

?>