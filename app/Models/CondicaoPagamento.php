<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicaoPagamento extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "CONDICAO_PAGAMENTO";
    protected $fillable = ["COD_CONDICAO_PAGAMENTO", "DSC_CONDICAO_PAGAMENTO", "IDF_ATIVO"];
    protected $primaryKey = "COD_CONDICAO_PAGAMENTO";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY CDP.DSC_CONDICAO_PAGAMENTO ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codCondicaoPagamento) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE CDP.COD_CONDICAO_PAGAMENTO = ? ";
        $dados = DB::select($sql, [$codCondicaoPagamento]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosUsuario($input);
        return CondicaoPagamento::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosUsuario($input);
        return CondicaoPagamento::where('COD_CONDICAO_PAGAMENTO', $input['COD_CONDICAO_PAGAMENTO'])->update($dados);
    }
    
    public function apaga($codCondicaoPagamento) {
        $tabela = CondicaoPagamento::FindOrFail($codCondicaoPagamento);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT CDP.COD_CONDICAO_PAGAMENTO ";
        $sql .= "      ,CDP.DSC_CONDICAO_PAGAMENTO ";
        $sql .= "      ,CDP.IDF_ATIVO ";
        $sql .= "      ,IF(CDP.IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO ";
        $sql .= "  FROM CONDICAO_PAGAMENTO CDP ";        
        return $sql;
    }
    
    private function getDadosInformadosUsuario($input) {
        $dados = ["COD_CONDICAO_PAGAMENTO"  => isset($input["COD_CONDICAO_PAGAMENTO"]) ? $input["COD_CONDICAO_PAGAMENTO"] : null,
                  "DSC_CONDICAO_PAGAMENTO"  => strtoupper($input["DSC_CONDICAO_PAGAMENTO"]),
                  "IDF_ATIVO"               => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
