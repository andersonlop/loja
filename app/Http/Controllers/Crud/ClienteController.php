<?php

namespace App\Http\Controllers\Crud;

use Validator;
use Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;

class ClienteController extends Controller {
    private $cliente;
    
    public function __construct (ClienteRepository $cliente) {
        $this->cliente = $cliente;
    }
    
    public function index() {
        $data['CLIENTE'] = $this->cliente->getTodos();
        return view('crud/Cliente/lista', $data, ['nomeTabela' => 'tabCliente']);
    }
    
    public function create() {
        return view('crud/Cliente/create', []);
    }
    
    public function edit($cliente) {
        $data['CLIENTE'] = $this->cliente->getPorCodigo($cliente);
        return view('crud/Cliente/edit', $data, []);
    }
    
    public function delete($cliente) {
        $data['CLIENTE'] = $this->cliente->getPorCodigo($cliente);
        return view('crud/Cliente/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->cliente->apaga(Request::input("COD_CLIENTE"));
        if ($executou):
        return redirect()->route("Cliente")->with("sucesso", "Cliente apagada com sucesso!");
        else:
        return redirect()->route("Cliente")->with("insucesso", "Problemas para apagar o Cliente!");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Cliente.edit", ["COD_CLIENTE" => Request::input("COD_CLIENTE")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->cliente->atualiza(Request::all());
        if ($executou):
        return redirect()->route("Cliente")->with("sucesso", "Cliente modificada com sucesso!");
        else:
        return redirect()->route("Cliente")->with("insucesso", "Problemas para modificar o Cliente!");
        endif;
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Cliente.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->cliente->grava(Request::all());
        if ($executou):
        return redirect()->route("Cliente")->with("sucesso", "Cliente adicionada com sucesso!");
        else:
        return redirect()->route("Cliente")->with("insucesso", "Problemas para inserir o Cliente!");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
            'MON_CLIENTE'  => 'require', 'string', 'max:45',
            'IDF_ATIVO'         => ['required', Rule::in(['S', 'N']),]
        ], [
            'MON_CLIENTE.max' => 'A descrição deve ter no máximo 45 caracteres.',
            'MON_CLIENTE.required' => 'A descricao nao pode ficar vazia.',
            'IDF_ATIVO.required' => 'O FLAG de Ativo/Inativo não pode ficar vazio.',
            'IDF_ATIVO.in' => 'O FLAG de Ativo/Inativo não foi preenchido corretamente!'
        ]);
    }
    
}
