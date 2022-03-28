<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitService extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'produit_services';
    protected $primaryKey   =   'id_prd_srv';
}
