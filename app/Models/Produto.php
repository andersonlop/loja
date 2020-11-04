<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "PRODUTO";
    protected $fillable = ["COD_PRODUTO", "NOM_PRODUTO", "DSC_PRODUTO", "IMG_PRODUTO", "EST_PRODUTO", "PCO_PRODUTO", "IDF_ATIVO"];
    protected $primaryKey = "COD_PRODUTO";
    
    public function getTodos() {
        $sql = $this->getSqlBasico();
        $sql .= " ORDER BY NOM_PRODUTO ";
        return DB::select($sql);
    }
    
    public function getPorCodigo($codProduto) {
        $sql = $this->getSqlBasico();
        $sql .= " WHERE COD_PRODUTO = ? ";
        $dados = DB::select($sql, [$codProduto]);
        return is_null($dados) ? null : $dados[0];
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosProduto($input);
        return Produto::insert($dados);
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosProduto($input);
        return Produto::where('COD_PRODUTO', $input['COD_PRODUTO'])->update($dados);
    }
    
    public function apaga($codProduto) {
        $tabela = Produto::FindOrFail($codProduto);
        return $tabela->delete();
    }
    
    private function getSqlBasico() {
        $sql  = "SELECT PRO.COD_PRODUTO";
        $sql .= "      ,PRO.NOM_PRODUTO";
        $sql .= "      ,PRO.DSC_PRODUTO";
        $sql .= "      ,PRO.IMG_PRODUTO";
        $sql .= "      ,PRO.EST_PRODUTO";
        $sql .= "      ,PRO.PCO_PRODUTO";
        $sql .= "      ,PRO.NOM_PRODUTO";
        $sql .= "      ,PRO.IDF_ATIVO";
        $sql .= "      ,IF(PRO.IDF_ATIVO = 'S', 'SIM', 'NÃO') DSC_ATIVO";
        $sql .= "      ,CAT.COD_CATEGORIA";
        $sql .= "      ,CAT.NOM_CATEGORIA";
        $sql .= "      ,FAB.COD_FABRICANTE"; 
        $sql .= "      ,FAB.NOM_FABRICANTE"; 
        $sql .= "  FROM PRODUTO PRO";
        $sql .= "  JOIN FABRICANTE FAB ON PRO.COD_FABRICANTE = FAB.COD_FABRICANTE";
        $sql .= "  JOIN CATEGORIA CAT ON PRO.COD_CATEGORIA = CAT.COD_CATEGORIA"; 
        return $sql;
    }
    
    private function getDadosInformadosProduto($input) {
        $dados = ["COD_PRODUTO"  => isset($input["COD_PRODUTO"]) ? $input["COD_PRODUTO"] : null,
                  "NOM_PRODUTO"  => strtoupper($input["NOM_PRODUTO"]),
                  "IDF_ATIVO"           => strtoupper($input["IDF_ATIVO"]),
                 ];
        return $dados;
    }
}
