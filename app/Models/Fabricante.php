<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "FABRICANTE";
    protected $fillable = ["COD_FABRICANTE", "NOM_FABRICANTE", "IDF_ATIVO"];
    protected $primaryKey = "COD_FABRICANTE";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY NOM_FABRICANTE ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codFabricante) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE COD_FABRICANTE = ? ";
        $dados = DB::select($sql, [$codFabricante]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosFabricante($input);
        return Fabricante::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosFabricante($input);
        return Fabricante::where('COD_FABRICANTE', $input['COD_FABRICANTE'])->update($dados);
    }
    
    public function apaga($codFabricante) {
        $tabela = Fabricante::FindOrFail($codFabricante);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT COD_FABRICANTE ";
        $sql .= "      ,NOM_FABRICANTE ";      
        $sql .= "      ,IDF_ATIVO ";
        $sql .= "      ,IF(IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO ";
        $sql .= "  FROM FABRICANTE ";        
        return $sql;
    }
    
    private function getDadosInformadosFabricante($input) {
        $dados = ["COD_FABRICANTE"   => isset($input["COD_FABRICANTE"]) ? $input["COD_FABRICANTE"] : null,
                  "NOM_FABRICANTE"   => strtoupper($input["NOM_FABRICANTE"]),                  
                  "IDF_ATIVO"        => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
