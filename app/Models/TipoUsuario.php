<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model {
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "TIPO_USUARIO";
    protected $fillable = ["COD_TIPO_USUARIO", "DSC_TIPO_USUARIO"];
    protected $primaryKey = "COD_TIPO_USUARIO";
    
    public function getTodos() {
        $sql  = $this->getSqlBasico();
        $sql .= ltrim(" ORDER BY TPU.DSC_TIPO_USUARIO ");
        $dados = DB::select($sql);
        return $dados;
    }

    public function getPorCodigo($codTipoUsuario) {
        $sql  = $this->getSqlBasico();
        $sql .= ltrim(" WHERE TPU.COD_TIPO_USUARIO = ? ");
        $dados = DB::select($sql, [$codTipoUsuario]);
        return is_null($dados) ? null : $dados[0] ;
    }
    
    public function grava($input) {
        $dados = $this->getDadosInformadosUsuario($input);
        return TipoUsuario::insert($dados);        
    }
    
    public function atualiza($input) {
        $dados = $this->getDadosInformadosUsuario($input);
        return TipoUsuario::where('COD_TIPO_USUARIO', '=', $input['COD_TIPO_USUARIO'])->update($dados);
    }

    public function apaga($codTipoUsuario) {
        $tabela = TipoUsuario::findOrFail($codTipoUsuario);
        return $tabela->delete();
    }    
    
    private function getSqlBasico() {
        $sql  = ltrim("SELECT TPU.COD_TIPO_USUARIO ");
        $sql .= ltrim("      ,TPU.DSC_TIPO_USUARIO ");
        $sql .= ltrim("  FROM TIPO_USUARIO TPU ");
        return $sql;
    }
    
    private function getDadosInformadosUsuario($input) {
        $dados = [  'COD_TIPO_USUARIO'  => isset($input['COD_TIPO_USUARIO']) ? $input['COD_TIPO_USUARIO'] : null,
                    'DSC_TIPO_USUARIO'  => strtoupper($input['DSC_TIPO_USUARIO']) 
                 ];
        date_default_timezone_set('America/Sao_Paulo');
        
        return $dados;
    }
    
}
