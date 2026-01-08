<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once __DIR__.'/../config/confDBPDO.php';
class DBPDO{
    public static function ejecutaConsulta($sentenciaSQL, $parametros){
        try{
            $conexion = new PDO(DSN, USERNAME, PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare($sentenciaSQL);
            $consulta->execute($parametros);
            
            return $consulta;
        } catch(PDOException $exPDO){
            throw new Exception("Error BD: ".$exPDO->getMessage());
        }
    }
}