<?php

require_once(__DIR__ . "/Clube.php");
require_once(__DIR__ . "/Marca.php");

class Camisa{
    private ?int $id;
    private ?string $nome;
    private ?Clube $clube;
    private ?Marca $marca;
    private ?string $sexo;
    private ?float $preco;

    public function __construct()
    {
        $this->id = 0;
        $this->marca = null;
        $this->clube = null;
    }
    
    // public function __toString() {
    //     return $this->nome; 
    // }
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setPreco($preco){
        $this->preco = $preco;
        return $this;
    }
    public function getPreco(){
        return $this->preco;
    }

    public function setMarca($marca){
        $this->marca = $marca;
        return $this;
    }
    public function getMarca(){
        return $this->marca;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
        return $this;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function getSexoTexto(){
        if($this->getSexo()== "M"){
            return "Masculino";
        }else if($this->getSexo()== "F"){
            return "Feminino";
        }else return "Unisex";
    }

    public function setClube($clube){
        $this->clube = $clube;
        return $this;
    }
    public function getClube(){
        return $this->clube;
    }

}