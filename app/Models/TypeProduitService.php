<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduitService extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'type_produit_services';
    protected $primaryKey   =   'id_type_prd_srv';
}
