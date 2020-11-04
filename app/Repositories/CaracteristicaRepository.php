<?php
namespace app\Repositories;

use App\Models\Caracteristica;

class CaracteristicaRepository {
    private $model;
    
    public  function __construct(Caracteristica $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }
    
    public function getPorCodigo($codCaracteristica) {
        return $this->model->getPorCodigo($codCaracteristica);
    }
    
    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codCaracteristica) {
        return $this->model->apaga($codCaracteristica);
    }
    
}
