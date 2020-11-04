<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoCompra extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "SITUACAO_COMPRA";
    protected $fillable = ["COD_SITUACAO_COMPRA", "DSC_SITUACAO_COMPRA", "IDF_ATIVO"];
    protected $primaryKey = "COD_SITUACAO_COMPRA";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY DSC_SITUACAO_COMPRA ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codsituacaocompra) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE COD_SITUACAO_COMPRA = ? ";
        $dados = DB::select($sql, [$codsituacaocompra]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosSituacaoCompra($input);
        return SituacaoCompra::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosSituacaoCompra($input);
        return SituacaoCompra::where('COD_SITUACAO_COMPRA', $input['COD_SITUACAO_COMPRA'])->update($dados);
    }
    
    public function apaga($codsituacaocompra) {
        $tabela = SituacaoCompra::FindOrFail($codsituacaocompra);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT COD_SITUACAO_COMPRA ";
        $sql .= "      ,DSC_SITUACAO_COMPRA ";
        $sql .= "      ,IDF_ATIVO ";
        $sql .= "      ,IF(IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO ";
        $sql .= "  FROM SITUACAO_COMPRA ";        
        return $sql;
    }
    
    private function getDadosInformadosCaracteristica($input) {
        $dados = ["COD_SITUACAO_COMPRA"  => isset($input["COD_SITUACAO_COMPRA"]) ? $input["COD_SITUACAO_COMPRA"] : null,
                  "DSC_SITUACAO_COMPRA"  => strtoupper($input["DSC_SITUACAO_COMPRA"]),
                  "IDF_ATIVO"           => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
