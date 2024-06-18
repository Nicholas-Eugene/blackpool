<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stick extends Model
{
    use HasFactory;

    protected $table = 'stick';

    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
        'mainpic',
        'pic2',
        'pic3',
        'pic4'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}