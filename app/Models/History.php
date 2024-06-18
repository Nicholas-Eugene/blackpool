<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_type',
        'date',
        'time',
        'totalprice',
        'paymentmethod',
        'created_at',
        'updated_at'
    ];

    public function user(){
		return $this->belongsTo(User::class);
	}

    public function stick(){
    return $this->belongsTo(Stick::class, 'product_id');
  }

    public function foodAndBeverage(){
    return $this->belongsTo(FoodAndBeverage::class, 'product_id');
  }

}
