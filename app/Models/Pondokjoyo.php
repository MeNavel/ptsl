<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pondokjoyo extends Model
{
    use HasFactory;
    protected $table = 'pondokjoyo';
    protected $guarded = [];
    public $timestamps = false;
}
