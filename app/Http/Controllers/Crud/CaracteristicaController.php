<?php

namespace App\Http\Controllers\Crud;

use Validator;
use Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\CaracteristicaRepository;

class CaracteristicaController extends Controller {
    private $caracteristica;
    
    public function __construct (CaracteristicaRepository $caracteristica) {
        $this->caracteristica = $caracteristica;
    }
    
    public function index() {
        $data['CARACTERISTICA'] = $this->caracteristica->getTodos();
        return view('crud/Caracteristica/lista', $data, ['nomeTabela' => 'tabCaracteristica']);
    }
    
    public function create() {
        return view('crud/Caracteristica/create', []);
    }
    
    public function edit($codCaracteristica) {
        $data['CARACTERISTICA'] = $this->caracteristica->getPorCodigo($codCaracteristica);
        return view('crud/Caracteristica/edit', $data, []);
    }
    
    public function delete($codCaracteristica) {
        $data['CARACTERISTICA'] = $this->caracteristica->getPorCodigo($codCaracteristica);
        return view('crud/Caracteristica/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->caracteristica->apaga(Request::input("COD_CARACTERISTICA"));
        if ($executou):
        return redirect()->route("Caracteristica")->with("sucesso", "Caracteristica apagada com sucesso!");
        else:
        return redirect()->route("Caracteristica")->with("insucesso", "Problemas para apagar a CCaracteristica!");
        endif;
    }
    
    public function update() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Caracteristica.edit", ["COD_CARACTERISTICA" => Request::input("COD_CARACTERISTICA")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->caracteristica->atualiza(Request::all());
        if ($executou):
        return redirect()->route("Caracteristica")->with("sucesso", "Caracteristica modificada com sucesso!");
        else:
        return redirect()->route("Caracteristica")->with("insucesso", "Problemas para modificar a Caracteristica!");
        endif;
    }
    
    public function post() {
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Caracteristica.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->caracteristica->grava(Request::all());
        if ($executou):
        return redirect()->route("Caracteristica")->with("sucesso", "Caracteristica adicionada com sucesso!");
        else:
        return redirect()->route("Caracteristica")->with("insucesso", "Problemas para inserir a Caracteristica!");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
            'MON_CARACTERISTICA'  => 'require', 'string', 'max:45',
            'IDF_ATIVO'         => ['required', Rule::in(['S', 'N']),]
        ], [
            'MON_CARACTERISTICA.max' => 'A descrição deve ter no máximo 45 caracteres.',
            'MON_CARACTERISTICA.required' => 'A descricao nao pode ficar vazia.',
            'IDF_ATIVO.required' => 'O FLAG de Ativo/Inativo não pode ficar vazio.',
            'IDF_ATIVO.in' => 'O FLAG de Ativo/Inativo não foi preenchido corretamente!'
        ]);
    }
    
}
