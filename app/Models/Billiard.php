<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billiard extends Model
{
    use HasFactory;

    protected $table = 'billiard';

	protected $fillable = [
		'name',
        'address',
        'rating',
        'totalrate',
        'priceperhour',
        'description',
        'openat',
        'telephone',
        'whatsapp',
        'insta',
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
