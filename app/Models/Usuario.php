<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable {
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'USUARIO';
    protected $primaryKey = 'COD_USUARIO';
    protected $fillable = ['NOM_USUARIO','email', 'password','DTA_HOR_CRIACAO_USUARIO','IDF_ATIVO','COD_TIPO_USUARIO','password_resets', 'remember_token'];
    protected $hidden = ['password','password_resets'];

    public function getAuthPassword() {
      return $this->password;
    }    
    
    public function getUsernameAttribute() {
        return $this->email;
    }
    
    public function getEmailForPasswordReset() {
        return $this->email;
    }
    
}