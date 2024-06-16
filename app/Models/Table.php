<?php
// Table.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Method to get available times for a table
    public function getAvailableTimes($date)
    {
        $bookedTimes = Booking::where('table_id', $this->id)
                              ->whereDate('date', $date)
                              ->pluck('time_slot')
                              ->toArray();

        $allTimes = ['10:00', '12:00', '14:00', '16:00', '18:00', '20:00']; // example time slots

        $availableTimes = array_diff($allTimes, $bookedTimes);

        return $availableTimes;
    }
}

?>
