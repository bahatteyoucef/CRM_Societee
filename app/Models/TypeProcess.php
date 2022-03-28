<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProcess extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'type_process';
    protected $primaryKey   =   'id';
}
