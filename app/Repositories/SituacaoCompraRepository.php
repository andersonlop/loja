<?php

namespace App\Repositories;

use App\Models\SituacaoCompra;

class SituacaoCompraRepository {

    private $model;
    
    public function __construct(SituacaoCompra $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }

    public function getPorCodigo($codSituacaoCompra) {
        return $this->model->getPorCodigo($codSituacaoCompra);
    }

    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codSituacaoCompra) {
        return $this->model->apaga($codSituacaoCompra);
    }
}