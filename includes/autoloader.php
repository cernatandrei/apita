<?php
spl_autoload_register(function($class){
    include 'includes/classes/' . str_replace('\\', '/', $class) . '.php';
});