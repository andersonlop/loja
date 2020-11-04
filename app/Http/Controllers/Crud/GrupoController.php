<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Repositories\GrupoRepository;

class GrupoController extends Controller {
    private $grupo;

    public function __construct( GrupoRepository $grupo ) {
        $this->grupo = $grupo;
    }
    
    public function index() {
        $data['GRUPO'] = $this->grupo->getTodos();
        return view('crud/Grupo/lista', $data, ['nomeTabela' => 'tabGrupo']);
    }
    
    public function create() {
        return view('crud/Grupo/create', []);
    }
    
    public function delete($codGrupo) {
        $data['GRUPO'] = $this->grupo->getPorCodigo($codGrupo);
        return view('crud/Grupo/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->grupo->apaga(Request::input('COD_GRUPO'));
        if ($executou):
            return redirect()->route("Grupo")->with("sucesso", "Grupo apagado com sucesso.");
        else:
            return redirect()->route("Grupo")->with("insucesso", "Problemas para apagar o Grupo");
        endif;
    }
    
    public function edit($codGrupo) {
        $data['GRUPO'] = $this->grupo->getPorCodigo($codGrupo);
        return view('crud/Grupo/edit', $data, []);
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
            return redirect()->route("Grupo.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->grupo->grava(Request::all());
        if ($executou):
            return redirect()->route("Grupo")->with("sucesso", "Grupo adicionado com sucesso.");
        else:
            return redirect()->route("Grupo")->with("insucesso", "Problemas para inserir o novo Grupo");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
            return redirect()->route("Grupo.edit", ['COD_GRUPO' => Request::input("COD_GRUPO")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->grupo->atualiza(Request::all());
        if ($executou):
            return redirect()->route("Grupo")->with("sucesso", "GRUPO modificado com sucesso.");
        else:
            return redirect()->route("Grupo")->with("insucesso", "Problemas para alterar o GRUPO");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
                'NOM_GRUPO' => 'required',
                ], [
                'same' => 'Este campo :attribute e :other devem ser idênticos.',
                'size' => 'O campo deve ter exatamente :size caracteres.',
                'min' => 'O campo deve ter no mínimo :min caracteres.',
                'max' => 'O campo deve ter no máximo :max caracteres.',
                'between' => 'O campo deve ter entre :min  e :max caracteres.',
                'in' => 'O campo must be one of the following types: :values',
                'required' => 'A descrição não pode ficar vazia.',
                'unique' => 'Este valor já está sendo utilizado.',
                'email' => 'Por favor, informe um email válido.',
                'regex' => 'O campo deve ser S ou N.'
        ]);
    }    
    
}
