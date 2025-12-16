<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_REQUEST['login'])){
    $_SESSION['paginaEnCurso'] = 'login';
    header('Location: indexLoginLogoff.php');
    exit;
}

// Mostramos en la vista.
require_once $view['layout'];
?>