<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementProcess extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'element_process';
    protected $primaryKey   =   'id';
}
