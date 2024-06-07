<?php

    class item {

        private $id;
        private $item;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getItem(){
            return $this->item;
        }

        public function setItem($item){
            $this->item = $item;
        }

    }

interface IItens {
    public function create(item $item);
    public function findAll();
}
?>