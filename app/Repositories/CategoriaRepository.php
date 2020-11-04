<?php
namespace app\Repositories;

use App\Models\Categoria;

class CategoriaRepository {
    private $model;
    
    public  function __construct(Categoria $model) {
        $this->model = $model;
    }
    
    public function getTodos() {
        return $this->model->getTodos();
    }
    
    public function getPorCodigo($codCategoria) {
        return $this->model->getPorCodigo($codCategoria);
    }
    
    public function grava($input) {
        return $this->model->grava($input);
    }
    
    public function atualiza($input) {
        return $this->model->atualiza($input);
    }
    
    public function apaga($codCategoria) {
        return $this->model->apaga($codCategoria);
    }
    
}
