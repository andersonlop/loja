<?php

namespace App\Http\Controllers\Crud;

use Validator;
use Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\CondicaoPagamentoRepository;

class CondicaoPagamentoController extends Controller {
    private $condicaoPagamento;
    
    public function __construct (CondicaoPagamentoRepository $condicaoPagamento) {
        $this->condicaoPagamento = $condicaoPagamento;
    }
    
    public function index() {
        $data['CONDICAOPAGAMENTO'] = $this->condicaoPagamento->getTodos();
        return view('crud/CondicaoPagamento/lista', $data, ['nomeTabela' => 'tabCondicoesPagamento']);
    }
    
    public function create() {
        return view('crud/CondicaoPagamento/create', []);
    }
    
    public function edit($codCondicaoPagamento) {
        $data['CONDICAOPAGAMENTO'] = $this->condicaoPagamento->getPorCodigo($codCondicaoPagamento);
        return view('crud/CondicaoPagamento/edit', $data, []);
    }
    
    public function delete($codCondicaoPagamento) {
        $data['CONDICAOPAGAMENTO'] = $this->condicaoPagamento->getPorCodigo($codCondicaoPagamento);
        return view('crud/CondicaoPagamento/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->condicaoPagamento->apaga(Request::input("COD_CONDICAO_PAGAMENTO"));
        if ($executou):
        return redirect()->route("CondicaoPagamento")->with("sucesso", "Condição de Pagamento apagada com sucesso!");
        else:
        return redirect()->route("CondicaoPagamento")->with("insucesso", "Problemas para apagar a Condição de Pagamento!");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("CondicaoPagamento.edit", ["COD_CONDICAO_PAGAMENTO" => Request::input("COD_CONDICAO_PAGAMENTO")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->condicaoPagamento->atualiza(Request::all());
        if ($executou):
        return redirect()->route("CondicaoPagamento")->with("sucesso", "Condição de Pagamento modificada com sucesso!");
        else:
        return redirect()->route("CondicaoPagamento")->with("insucesso", "Problemas para modificar a Condição de Pagamento!");
        endif;
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("CondicaoPagamento.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->condicaoPagamento->grava(Request::all());
        if ($executou):
        return redirect()->route("CondicaoPagamento")->with("sucesso", "Condição de Pagamento adicionada com sucesso!");
        else:
        return redirect()->route("CondicaoPagamento")->with("insucesso", "Problemas para inserir a Condição de Pagamento!");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
            'DSC_TIPO_USUARIO'  => 'require', 'string', 'max:45',
            'IDF_ATIVO'         => ['required', Rule::in(['S', 'N']),]
        ], [
            'DSC_TIPO_USUARIO.max' => 'A descrição deve ter no máximo 45 caracteres.',
            'DSC_TIPO_USUARIO.required' => 'A descricao nao pode ficar vazia.',
            'IDF_ATIVO.required' => 'O FLAG de Ativo/Inativo não pode ficar vazio.',
            'IDF_ATIVO.in' => 'O FLAG de Ativo/Inativo não foi preenchido corretamente!'
        ]);
    }
    
}
