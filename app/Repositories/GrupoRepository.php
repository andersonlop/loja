<?php

namespace App\Repositories;

use App\Models\Grupo;

class GrupoRepository {

    private $model;
    
    public function __construct(Grupo $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }

    public function getPorCodigo($codGrupo) {
        return $this->model->getPorCodigo($codGrupo);
    }

    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codGrupo) {
        return $this->model->apaga($codGrupo);
    }
}