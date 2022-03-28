<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'societees';
    protected $primaryKey   =   'id';
}
