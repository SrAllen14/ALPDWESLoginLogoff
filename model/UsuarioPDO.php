<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once 'DBPDO.php';
require_once 'Usuario.php';
class UsuarioPDO{
    public static function validarUsuario($codUsuario, $password){
        $conexion = DBPDO::getConexion();
        
        $sql = "SELECT * FROM T01_Usuarios WHERE T01_CodUsuario = :usuario AND T01_Password = SHA2(:password, 256);";
        $parametros = [':usuario' => $codUsuario, ':password' => $password];
        $fila = DBPDO::ejecutaConsulta($sql, $conexion, $parametros);
        
        // Comprobamos que el usuario es valido.
        if($fila){
            // Si el usuario es valido.
            $usuario = new Usuario(
                $fila['T01_CodUsuario'],
                $fila['T01_DescUsuario'],
                $fila['T01_Password'],
                $fila['T01_Perfil'],
                null,
                new DateTime($fila['T01_FechaHoraUltimaConexion'])
            );
            
            self::actualizarUltimaConexionYUsuario($usuario, $conexion);
            $_SESSION['usuarioActualDWESLoginLogoff'] = $usuario;
            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        }
    }
    
    public static function actualizarUltimaConexionYUsuario($usuario, $conexion){
        $codUsuario = $usuario->getCodUsuario();
        $password = $usuario->getPassword();
        $sqlUpdate = "UPDATE T01_Usuarios SET T01_NumConexiones = T01NumConexiones + 1, T01_FechaHoraUltimaConexion = NOW() WHERE T01_CodUsuario = :usuario";
        $parametrosUpdate=[':usuario' => $codUsuario];
        DBPDO::ejecutaConsulta($sqlUpdate, $conexion, $parametrosUpdate);
        
        $sqlSelect = "SELECT * FROM T01_Usuarios WHERE T01_CodUsuarios = :usuario AND T01_Password = :password";
        $parametrosSelect = [':usuario' => $codUsuario, ':password' => $password];
        $resultadoSelect = DBPDO::ejecutaConsulta($sqlSelect, $conexion, $parametrosSelect);
        
        $usuario->setFechaHoraUltimaConexion(new DateTime($resultadoSelect['T01_FechaHoraUltimaConexion']));
    }
    
    public static function altaUsuario(){
        
    }
    
    public static function modificarUsuario(){
        
    }
    
    public static function borrarUsuario(){
        
    }
    
    public static function validarCodNoExiste(){
        
    }
}
?>