<?php
/*
 * @author: Alvaro Allen
 * @since: 16/12/2025  
 */

require_once __DIR__.'/../model/UsuarioPDO.php';

// Comprobamos si el botón "cancelar" ha sido pulsado.
if(isset($_REQUEST['cancelar'])){
    // Si ha sido pulsado le damos el valor de la página solicitada a la variable $_SESSION.
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexLoginLogoff.php');
    exit;
}

// Comprobamos si el botón "iniciar" ha sido pulsado.
if(isset($_REQUEST['iniciar'])){
    // Si ha sido pulsado le damos el valor de la página solicitada a la variable $_SESSION.
    $codUsuario = $_REQUEST['codUsuario'];
    $password = $_REQUEST['password'];
    
    $usuarioPDO = new UsuarioPDO();
    $usuario = $usuarioPDO->validarUsuario($codUsuario, $password);
    if($usuario){
        $_SESSION['usuarioActualDWESLoginLogoff'] = $usuario;
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: indexLoginLogoff.php');
        exit;
    }
}

// Cargamos el layout principal, y cargará cada página a parte de la estructura principal de la web.
require_once $view['layout'];
?>