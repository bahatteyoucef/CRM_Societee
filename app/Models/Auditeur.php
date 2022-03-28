<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Auditeur extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'auditeurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom',	'email', 'password','id_role', 'id_fonction', 'id_structure', 'id_societee'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];


    public function getAuthPassword()
    {
      return $this->password;
    }
}
