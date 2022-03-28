<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteVenteAchat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'unite_vente_achats';
    protected $primaryKey   =   'id_unite_vente_achat';
}
