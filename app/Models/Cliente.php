<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "CLIENTE";
    protected $fillable = ["COD_CLIENTE", "NOM_CLIENTE", "IDF_ATIVO"];
    protected $primaryKey = "COD_CLIENTE";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY NOM_CLIENTE ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codCliente) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE COD_CLIENTE = ? ";
        $dados = DB::select($sql, [$codCliente]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosCliente($input);
        return Cliente::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosCliente($input);
        return Cliente::where('COD_CLIENTE', $input['COD_CLIENTE'])->update($dados);
    }
    
    public function apaga($codCliente) {
        $tabela = Cliente::FindOrFail($codCliente);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT COD_CLIENTE ";
        $sql .= "      ,NOM_CLIENTE ";
        $sql .= "      ,IDF_ATIVO ";
        $sql .= "      ,IF(IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO ";
        $sql .= "  FROM CLIENTE ";        
        return $sql;
    }
    
    private function getDadosInformadosCliente($input) {
        $dados = ["COD_CLIENTE"  => isset($input["COD_CLIENTE"]) ? $input["COD_CLIENTE"] : null,
                  "NOM_CLIENTE"  => strtoupper($input["NOM_CLIENTE"]),
                  "IDF_ATIVO"           => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
