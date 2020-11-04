<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "CATEGORIA";
    protected $fillable = ["COD_CATEGORIA", "NOM_CATEGORIA", "IDF_ATIVO", "COD_DEPARTAMENTO"];
    protected $primaryKey = "COD_CATEGORIA";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY POS_CATEGORIA ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codCategoria) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE COD_CATEGORIA = ? ";
        $dados = DB::select($sql, [$codCategoria]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosCategoria($input);
        return Categoria::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosCategoria($input);
        return Categoria::where('COD_CATEGORIA', $input['COD_CATEGORIA'])->update($dados);
    }
    
    public function apaga($codCategoria) {
        $tabela = Categoria::FindOrFail($codCategoria);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT CAT.COD_CATEGORIA";
        $sql .= "      ,CAT.NOM_CATEGORIA";
        $sql .= "      ,CAT.IDF_ATIVO";
        $sql .= "      ,IF(CAT.IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO";
        $sql .= "      ,DEP.COD_DEPARTAMENTO";
        $sql .= "      ,DEP.NOM_DEPARTAMENTO"; 
        $sql .= "  FROM CATEGORIA CAT";
        $sql .= "  JOIN DEPARTAMENTO DEP ON CAT.COD_DEPARTAMENTO = DEP.COD_DEPARTAMENTO";       
        return $sql;
    }
    
    private function getDadosInformadosCategoria($input) {
        $dados = ["COD_CATEGORIA"  => isset($input["COD_CATEGORIA"]) ? $input["COD_CATEGORIA"] : null,
                  "NOM_CATEGORIA"  => strtoupper($input["NOM_CATEGORIA"]),
                  "IDF_ATIVO"      => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
