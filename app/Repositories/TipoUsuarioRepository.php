<?php

namespace App\Repositories;

use App\Models\TipoUsuario;

class TipoUsuarioRepository {

    private $model;
    
    public function __construct(TipoUsuario $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }

    public function getPorCodigo($codTipoUsuario) {
        return $this->model->getPorCodigo($codTipoUsuario);
    }

    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codTipoUsuario) {
        return $this->model->apaga($codTipoUsuario);
    }
}