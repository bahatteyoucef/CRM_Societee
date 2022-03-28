<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Willaya extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'willayas';
    protected $primaryKey   =   'id_willaya';
}
