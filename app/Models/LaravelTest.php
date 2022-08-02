<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaravelTest extends Model
{
    use HasFactory;
    protected $table='laraveltest';
    public $timestamps= false;
}
