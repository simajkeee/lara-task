<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'auto_brand',
        'parking_number_id',
        'checkin_date',
        'checkout_date',
        'customer_id',
        'price'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
