<?php

namespace App\Http\Controllers\Crud;

use Validator;
use Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriaRepository;

class CategoriaController extends Controller {
    private $categoria;
    
    public function __construct (CategoriaRepository $categoria) {
        $this->categoria = $categoria;
    }
    
    public function index() {
        $data['CATEGORIA'] = $this->categoria->getTodos();
        return view('crud/Categoria/lista', $data, ['nomeTabela' => 'tabCategoria']);
    }
    
    public function create() {
        return view('crud/Categoria/create', []);
    }
    
    public function edit($codCategoria) {
        $data['CATEGORIA'] = $this->categoria->getPorCodigo($codCategoria);
        return view('crud/Categoria/edit', $data, []);
    }
    
    public function delete($codCategoria) {
        $data['CATEGORIA'] = $this->categoria->getPorCodigo($codCategoria);
        return view('crud/Categoria/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->categoria->apaga(Request::input("COD_CATEGORIA"));
        if ($executou):
        return redirect()->route("Categoria")->with("sucesso", "Categoria apagada com sucesso!");
        else:
        return redirect()->route("Categoria")->with("insucesso", "Problemas para apagar a Categoria!");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Categoria.edit", ["COD_CATEGORIA" => Request::input("COD_CATEGORIA")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->categoria->atualiza(Request::all());
        if ($executou):
        return redirect()->route("Categoria")->with("sucesso", "Categoria modificada com sucesso!");
        else:
        return redirect()->route("Categoria")->with("insucesso", "Problemas para modificar a Categoria!");
        endif;
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Categoria.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->categoria->grava(Request::all());
        if ($executou):
        return redirect()->route("Categoria")->with("sucesso", "Categoria adicionada com sucesso!");
        else:
        return redirect()->route("Categoria")->with("insucesso", "Problemas para inserir a Categoria!");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
            'NOM_CATEGORIA'  => 'require', 'string', 'max:45',
            'IDF_ATIVO'         => ['required', Rule::in(['S', 'N']),]
        ], [
            'NOM_CATEGORIA.max' => 'A descrição deve ter no máximo 45 caracteres.',
            'NOM_CATEGORIA.required' => 'A descricao nao pode ficar vazia.',
            'IDF_ATIVO.required' => 'O FLAG de Ativo/Inativo não pode ficar vazio.',
            'IDF_ATIVO.in' => 'O FLAG de Ativo/Inativo não foi preenchido corretamente!'
        ]);
    }
    
}
