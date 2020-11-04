<?php
namespace app\Repositories;

use App\Models\CondicaoPagamento;

class CondicaoPagamentoRepository {
    private $model;
    
    public  function __construct(CondicaoPagamento $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }
    
    public function getPorCodigo($codCondicaoPagamento) {
        return $this->model->getPorCodigo($codCondicaoPagamento);
    }
    
    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codCondicaoPagamento) {
        return $this->model->apaga($codCondicaoPagamento);
    }
    
}
