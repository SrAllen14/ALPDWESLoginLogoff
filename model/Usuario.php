<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Usuario{
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;
    
    public function __construct($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos){
        this->codUsuario = $codUsuario;    
        this->descUsuario = $descUsuario;
        this->password = $password;
        this->perfil = $perfil;
        this->ultimaConexion = $ultimaConexion;
        this->contadorAccesos = $contadorAccesos;
    }
    
    public function getCodUsuario(){
        return this->codUsuario;
    }
    
    public function getDescUsuario(){
        return this->descUsuario;
    }
    
    public function getPassword(){
        return this->password;
    }
    
    public function getPerfil(){
        return this->perfil;
    }
    
    public function getUltimaConexion(){
        return this->ultimaConexion;
    }
    
    public function getContadorAccesos(){
        return this->contadorAccesos;
    }
    
    public function setCodUsuario($codUsuario){
        this->codUsuario = $codUsuario;
    }
    
    public function setDescUsuario($descUsuario){
        this->descUsuario = $descUsuario;
    }
    
    public function setPassword($password){
        this->password = $password;
    }
    
    public function setPerfil($perfil){
        this->perfil = $perfil;
    }
    
    public function setUltimaConexion($ultimaConexion){
        this->ultimaConexion = $ultimaConexion;
    }
    
    public function setContadorAccesos($contadorAccesos){
        this->contadorAccesos = $contadorAccesos;
    }
}
?>