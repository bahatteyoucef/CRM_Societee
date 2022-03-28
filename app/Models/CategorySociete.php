<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySociete extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'category_societes';
    protected $primaryKey   =   'id_category_societe';
}
