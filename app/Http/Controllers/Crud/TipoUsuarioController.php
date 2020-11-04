<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Repositories\TipoUsuarioRepository;

class TipoUsuarioController extends Controller {
    private $tipoUsuario;

    public function __construct( TipoUsuarioRepository $tipoUsuario ) {
        $this->tipoUsuario = $tipoUsuario;
    }
    
    public function index() {
        $data['TIPOUSUARIO'] = $this->tipoUsuario->getTodos();
        return view('crud/TipoUsuario/lista', $data, ['nomeTabela' => 'tabTiposUsuario']);
    }
    
    public function create() {
        return view('crud/TipoUsuario/create', []);
    }
    
    public function delete($codTipoUsuario) {
        $data['TIPOUSUARIO'] = $this->tipoUsuario->getPorCodigo($codTipoUsuario);
        return view('crud/TipoUsuario/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->tipoUsuario->apaga(Request::input('COD_TIPO_USUARIO'));
        if ($executou):
            return redirect()->route("TipoUsuario")->with("sucesso", "Tipo do Usuário apagado com sucesso.");
        else:
            return redirect()->route("TipoUsuario")->with("insucesso", "Problemas para apagar o Tipo de Usuário");
        endif;
    }
    
    public function edit($codTipoUsuario) {
        $data['USUARIO'] = $this->tipoUsuario->getPorCodigo($codTipoUsuario);
        return view('crud/TipoUsuario/edit', $data, []);
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
            return redirect()->route("TipoUsuario.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->tipoUsuario->grava(Request::all());
        if ($executou):
            return redirect()->route("TipoUsuario")->with("sucesso", "Tipo do Usuário adicionado com sucesso.");
        else:
            return redirect()->route("TipoUsuario")->with("insucesso", "Problemas para inserir o novo Tipo de Usuário");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
            return redirect()->route("TipoUsuario.edit", ['COD_TIPO_USUARIO' => Request::input("COD_TIPO_USUARIO")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->tipoUsuario->atualiza(Request::all());
        if ($executou):
            return redirect()->route("TipoUsuario")->with("sucesso", "Tipo do Usuário modificado com sucesso.");
        else:
            return redirect()->route("TipoUsuario")->with("insucesso", "Problemas para alterar o Tipo de Usuário");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
                'DSC_TIPO_USUARIO' => 'required',
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
