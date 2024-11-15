<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;
use App\Models\User;

class Transaction extends Model
{
    // Define the table name if it doesn't follow Laravel's convention
    protected $table = 'transaksis';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'mobil_id',
        'user_id',
        'rental_days',
        'total_cost',
        'status',
    ];

    // Define casting for the attributes
    protected $casts = [
        'total_cost' => 'decimal:2', // total_cost as decimal with two decimal points
        'rental_days' => 'integer',  // rental_days as integer
    ];

    // Define the relationship with Mobil model (each transaction belongs to a mobil)
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    // Define the relationship with User model (each transaction is made by a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
