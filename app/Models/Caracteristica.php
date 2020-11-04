<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "CARACTERISTICA";
    protected $fillable = ["COD_CARACTERISTICA", "NOM_CARACTERISTICA", "IDF_ATIVO"];
    protected $primaryKey = "COD_CARACTERISTICA";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY NOM_CARACTERISTICA ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codCaracteristica) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE COD_CARACTERISTICA = ? ";
        $dados = DB::select($sql, [$codCaracteristica]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosCaracteristica($input);
        return Caracteristica::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosCaracteristica($input);
        return Caracteristica::where('COD_CARACTERISTICA', $input['COD_CARACTERISTICA'])->update($dados);
    }
    
    public function apaga($codCaracteristica) {
        $tabela = Caracteristica::FindOrFail($codCaracteristica);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT COD_CARACTERISTICA ";
        $sql .= "      ,NOM_CARACTERISTICA ";
        $sql .= "      ,IDF_ATIVO ";
        $sql .= "      ,IF(IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO ";
        $sql .= "  FROM CARACTERISTICA ";        
        return $sql;
    }
    
    private function getDadosInformadosCaracteristica($input) {
        $dados = ["COD_CARACTERISTICA"  => isset($input["COD_CARACTERISTICA"]) ? $input["COD_CARACTERISTICA"] : null,
                  "NOM_CARACTERISTICA"  => strtoupper($input["NOM_CARACTERISTICA"]),
                  "IDF_ATIVO"           => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
