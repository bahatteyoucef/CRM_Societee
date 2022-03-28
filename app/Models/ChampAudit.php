<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampAudit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'champ_audit';
    protected $primaryKey   =   'id';
}
