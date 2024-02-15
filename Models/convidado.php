<?php

class Convidado {
    private $id;
    private $convidado;
    private $idade;
    private $consumoL;
    private $consumoS;

    public function getId(){
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getConvidado(){
        return $this->convidado;
    }

    public function setConvidado($convidado) {
        $this->convidado = $convidado;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = intval($idade);
    }

    public function getConsumoL(){
        return $this->consumoL;
    }

    public function setConsumoL($consumoL) {
        $this->consumoL = $consumoL;
    }

    public function getConsumoS(){
        return $this->consumoS;
    }

    public function setConsumoS($consumoS) {
        $this->consumoS = $consumoS;
    }

    public function CalcConsumoS($idade) {
        $this->idade = $idade;
        if($idade >= 18){
            return 700;
        }
        else{
            return 350;
        }
    }
    public function CalcConsumoL($idade) {
        $this->idade = $idade;
        if($idade >= 18){
            return 400;
        }
        else{
            return 200;
        }
    }
}

interface IConvidadoDAO{
    public function create(Convidado $convidado);
    public function findAll();
}
?>