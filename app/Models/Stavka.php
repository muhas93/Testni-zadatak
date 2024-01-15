<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stavka extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'category', 'quantity', 'price', 'added_date'];
    protected $dates = ['added_date'];
}
