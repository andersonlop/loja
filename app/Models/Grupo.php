<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "GRUPO";
    protected $fillable = ["COD_GRUPO", "NOM_GRUPO","IDF_ATIVO"];
    protected $primaryKey = "COD_GRUPO";
    
    public function getTodos() {
        $sql  = $this->getSqlBasico();
        $sql .= ltrim(" ORDER BY NOM_GRUPO ");
        $dados = DB::select($sql);
        return $dados;
    }

    public function getPorCodigo($codGrupo) {
        $sql  = $this->getSqlBasico();
        $sql .= ltrim(" WHERE COD_GRUPO = ? ");
        $dados = DB::select($sql, [$codGrupo]);
        return is_null($dados) ? null : $dados[0] ;
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosGrupo($input);
        return Grupo::insert($dados);        
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosGrupo($input);
        return Grupo::where('COD_GRUPO', '=', $input['COD_GRUPO'])->update($dados);
    }

    public function apaga($codGrupo) {
        $tabela = Grupo::findOrFail($codGrupo);
        return $tabela->delete();
    }    
    
    private function getSqlBasico() {
        $sql  = ltrim("SELECT COD_GRUPO ");
        $sql .= ltrim("      ,NOM_GRUPO ");
        $sql .= "            ,IDF_ATIVO ";
        $sql .= "            ,IF(IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO ";
        $sql .= ltrim("  FROM GRUPO ");
        return $sql;
    }
    
    private function getDadosInformadosGrupo($input) {
        $dados = [  'COD_GRUPO'  => isset($input['COD_GRUPO']) ? $input['COD_GRUPO'] : null,
                    'NOM_GRUPO'  => strtoupper($input['NOM_GRUPO']) 
                   // "IDF_ATIVO"  => strtoupper($input["IDF_ATIVO"]),
                 ];
        date_default_timezone_set('America/Sao_Paulo');
        
        return $dados;
    }
    
}
