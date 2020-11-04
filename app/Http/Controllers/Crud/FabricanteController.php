<?php

namespace App\Http\Controllers\Crud;

use Validator;
use Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\FabricanteRepository;

class FabricanteController extends Controller {
    private $fabricante;
    
    public function __construct (FabricanteRepository $fabricante) {
        $this->fabricante = $fabricante;
    }
    
    public function index() {
        $data['FABRICANTE'] = $this->fabricante->getTodos();
        return view('crud/Fabricante/lista', $data, ['nomeTabela' => 'tabFabricante']);
    }
    
    public function create() {
        return view('crud/Fabricante/create', []);
    }
    
    public function edit($codFabricante) {
        $data['FABRICANTE'] = $this->fabricante->getPorCodigo($codFabricante);
        return view('crud/Fabricante/edit', $data, []);
    }
    
    public function delete($codFabricante) {
        $data['FABRICANTE'] = $this->fabricante->getPorCodigo($codFabricante);
        return view('crud/Fabricante/delete', $data, []);
    }
    
    public function erase() {
        $executou = $this->fabricante->apaga(Request::input("COD_FABRICANTE"));
        if ($executou):
        return redirect()->route("Fabricante")->with("sucesso", "Fabricante apagada com sucesso!");
        else:
        return redirect()->route("Fabricante")->with("insucesso", "Problemas para apagar a Fabricante!");
        endif;
    }   
 
    public function update() {
       //dd(Request::all());
        $validator = $this->getValidator();
        if ($validator->fails()):
        //dd($validator);
        return redirect()->route("Fabricante.edit", ["COD_FABRICANTE" => Request::input("COD_FABRICANTE")])->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->fabricante->atualiza(Request::all());
        if ($executou):
        return redirect()->route("Fabricante")->with("sucesso", "Fabricante modificada com sucesso!");
        else:
        return redirect()->route("Fabricante")->with("insucesso", "Problemas para modificar a Fabricante!");
        endif;
    }
    
    public function post() {
        //dd(Request::all());
        $validator = $this->getValidator();
        if ($validator->fails()):
        return redirect()->route("Fabricante.create")->withErrors($validator)->withInput();
        endif;
        
        $executou = $this->fabricante->grava(Request::all());
        if ($executou):
        return redirect()->route("Fabricante")->with("sucesso", "Fabricante adicionada com sucesso!");
        else:
        return redirect()->route("Fabricante")->with("insucesso", "Problemas para inserir a Fabricante!");
        endif;
    }
    
    private function getValidator() {
        return Validator::make(Request::all(), [
            'NOM_FABRICANTE'  => 'required', 'string', 'max:45',            
            'IDF_ATIVO'       => ['required', Rule::in(['S', 'N']),]
        ], [
            'NOM_FABRICANTE.max' => 'A descrição deve ter no máximo 45 caracteres.',            
            'NOM_FABRICANTE.required' => 'A descricao nao pode ficar vazia.',
            'IDF_ATIVO.required' => 'O FLAG de Ativo/Inativo não pode ficar vazio.',
            'IDF_ATIVO.in' => 'O FLAG de Ativo/Inativo não foi preenchido corretamente!'
        ]);
    }
    
}
