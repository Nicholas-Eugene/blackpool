<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartBooking extends Model
{
    use HasFactory;

    protected $table = 'cart_bookings'; // Use the correct table name

    protected $fillable = [
        'table_id',
        'user_id',
        'date',
        'time',
        'totalprice',
        'status',
    ];

    protected $casts = [
        'time' => 'array', // Cast time as array
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
