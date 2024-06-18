<?php

namespace App\Models;

use App\Models\Stick; // Ensure Stick class is imported
use App\Models\foodandbeverage; // Ensure FoodAndBeverage class is imported
use App\Models\User; // Ensure User class is imported
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'product_type',
        'user_id',
        'totalprice',
        'quantity',
        'date', // Add the date field here
        'created_at',
        'updated_at'
	];


  public function product()
    {
        switch ($this->product_type) {
            case 'stick':
                return $this->belongsTo(Stick::class, 'product_id');
            case 'food':
            case 'drinks':
                return $this->belongsTo(FoodAndBeverage::class, 'product_id');
            default:
                return null; // or throw an exception if desired
        }
    }

    public function user(){
		return $this->belongsTo(User::class);
	}
}
