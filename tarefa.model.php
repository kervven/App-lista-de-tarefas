<?php

    class Tarefa {
        private $id;
        private $id_status;
        private $tarefa;
        private $data_cadastro;


        public function __construct($id, $id_status, $tarefa, $data_cadastro)
        {
            $this->id = $id;
            $this->id_status = $id_status;
            $this->tarefa = $tarefa;
            $this->data_cadastro = $data_cadastro;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }
    }