<?php
namespace app\Repositories;

use App\Models\Fabricante;

class FabricanteRepository {
    private $model;
    
    public  function __construct(Fabricante $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }
    
    public function getPorCodigo($codFabricante) {
        return $this->model->getPorCodigo($codFabricante);
    }
    
    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codFabricante) {
        return $this->model->apaga($codFabricante);
    }
    
}
