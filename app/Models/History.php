<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    protected $fillable = [
        'billiard_id',
        'user_id',
        'date',
        'time',
        'totalprice',
        'tablenumber',
        'totaltables',
        'paymentmethod'
	];

    public function user(){
		return $this->belongsTo(User::class);
	}

    public function billiard(){
		return $this->belongsTo(Billiard::class);
	}
}
