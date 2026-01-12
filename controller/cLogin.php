<?php
/*
 * @author: Alvaro Allen
 * @since: 08/01/2026  
 */

// Comprobamos si el botón "cancelar" ha sido pulsado.
if(isset($_REQUEST['cancelar'])){
    // Si ha sido pulsado le damos el valor de la página solicitada a la variable $_SESSION.
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexLoginLogoff.php');
    exit;
}

$aErrores = [
    'usuario' => null,
    'password' => null
];

$aRespuestas = [
    'usuario' => null,
    'password' => null
];

$entradaOk = true;

// Comprobamos si el botón "iniciar" ha sido pulsado.
if(isset($_REQUEST['iniciar'])){
    // Si ha sido pulsado le damos el valor de la página solicitada a la variable $_SESSION.
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    
    // Validar los campos del formulario.
    $aErrores['usuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['codUsuario'], 255, 0, 0);
    $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 20, 2, 1, 1);
    
    // Guardamos las respuestas una vez validadas.
    $aRespuestas['usuario'] = $_REQUEST['codUsuario'];
    $aRespuestas['password'] = $_REQUEST['password'];
    
    // Verificar si hay errores de validación.
    foreach ($aErrores as $valorCampo => $mensajeError){
        if($mensajeError != null){
            $entradaOk = false;
        } /*else{
            // En caso de Guardar en un objeto el usuario introducido.
            $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['codUsuario'], $_REQUEST['password']);
            if($oUsuario === null){
                $entradaOk = false;
            }
        }*/
    }
    
    if($entradaOk){
        $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['codUsuario'], $_REQUEST['password']);
        if($oUsuario === null){
            $entradaOk = false;
        }
    }   
} else{
    $entradaOk = false;
}

// Si la validación es correcta, validar con la BD.
if($entradaOk){
    UsuarioPDO::actualizarUltimaConexionUsuario($oUsuario);
    // Crea la sesión con el objeto usuario
    $_SESSION['usuarioDWESLoginLogoff'] = $oUsuario;

    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: indexLoginLogoff.php');
    exit; 
}  
// Cargamos el layout principal, y cargará cada página a parte de la estructura principal de la web.
require_once $view['layout'];
?>