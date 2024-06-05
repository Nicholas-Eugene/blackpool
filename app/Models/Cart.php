<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'billiard_id',
        'user_id',
        'date',
        'time',
        'totalprice',
        'tablenumber',
        'totaltables'
	];

    public function billiard(){
		return $this->belongsTo(Billiard::class);
	}

    public function user(){
		return $this->belongsTo(User::class);
	}
}
