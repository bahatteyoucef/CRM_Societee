<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduitService extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'category_produit_services';
    protected $primaryKey   =   'id_category_prd_srv';
}
