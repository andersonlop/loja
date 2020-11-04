<?php

  namespace App\Models;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  
  class Constantes extends Model {
  use HasFactory;
  
  const TIPO_USUARIO_ADMIN = 0;
  const TIPO_USUARIO_GERENTE = 1;
  const TIPO_USUARIO_FUNCIONARIO = 2;
  const TIPO_USUARIO_CLIENTE = 3;
  const TIPO_USUARIO_FORNECEDOR = 4;
}
