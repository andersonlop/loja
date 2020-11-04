<?php
namespace app\Repositories;

use App\Models\Cliente;

class ClienteRepository {
    private $model;
    
    public  function __construct(Cliente $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }
    
    public function getPorCodigo($cliente) {
        return $this->model->getPorCodigo($cliente);
    }
    
    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($cliente) {
        return $this->model->apaga($cliente);
    }
    
}
