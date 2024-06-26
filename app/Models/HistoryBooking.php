<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBooking extends Model
{
    use HasFactory;

    protected $table = 'history_bookings'; // Use the correct table name

    protected $fillable = [
        'table_id',
        'user_id',
        'booking_start',
        'time',
        'total_price',
        'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
