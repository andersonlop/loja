<?php

namespace App\Http\Controllers\Crud;

use Validator;
use Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\SituacaoCompraRepository;

class SituacaoCompraController extends Controller {
    private $situacaocompra;
    
    public function __construct (SituacaoCompraRepository $situacaocompra) {
        $this->situacaocompra = $situacaocompra;
    }
    
    public function index() {
        $data['SITUACAO_COMPRA'] = $this->situacaocompra->getTodos();
        return view('crud/SituacaoCompra/lista', $data, ['nomeTabela' => 'tabSituacaoCompra']);
    }
    
    public function create() {
        return view('crud/SituacaoCompra/create', []);
    }
    
    public function edit($codsituacaocompra {
        $data['SITUACAO_COMPRA'] = $this->situacaocompra->getPorCodigo($codsituacaocompra);
        return view('crud/SituacaoCompra/edit', $data, []);
    }
    
    public function delete($codsituacaocompra) {
        $data['SITUACAO_COMPRA'] = $this->situacaocompra->getPorCodigo($codsituacaocompra);
        return view('crud/SituacaoCompra/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->situacaocompra->apaga(Request::input("COD_SITUACAO_COMPRA"));
        if ($executou):
        return redirect()->route("SituacaoCompra")->with("sucesso", "Situacao Compra apagada com sucesso!");
        else:
        return redirect()->route("SituacaoCompra")->with("insucesso", "Problemas para apagar a CCaracteristica!");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("SituacaoCompra.edit", ["COD_SITUACAO_COMPRA" => Request::input("COD_SITUACAO_COMPRA")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->situacaocompra->atualiza(Request::all());
        if ($executou):
        return redirect()->route("SituacaoCompra")->with("sucesso", "Situacao Compra modificada com sucesso!");
        else:
        return redirect()->route("SituacaoCompra")->with("insucesso", "Problemas para modificar a Situacao Compra!");
        endif;
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("SituacaoCompra.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->situacaocompra->grava(Request::all());
        if ($executou):
        return redirect()->route("SituacaoCompra")->with("sucesso", "Situacao Compra adicionada com sucesso!");
        else:
        return redirect()->route("SituacaoCompra")->with("insucesso", "Problemas para inserir a Situacao Compra!");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
            'DSC_SITUACAO_COMPRA'  => 'require', 'string', 'max:45',
            'IDF_ATIVO'         => ['required', Rule::in(['S', 'N']),]
        ], [
            'DSC_SITUACAO_COMPRA.max' => 'A descrição deve ter no máximo 45 caracteres.',
            'DSC_SITUACAO_COMPRA.required' => 'A descricao nao pode ficar vazia.',
            'IDF_ATIVO.required' => 'O FLAG de Ativo/Inativo não pode ficar vazio.',
            'IDF_ATIVO.in' => 'O FLAG de Ativo/Inativo não foi preenchido corretamente!'
        ]);
    }
    
}
