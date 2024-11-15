<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mobil;
use App\Models\User;

class Transaction extends Model
{
    // Define the table name if it doesn't follow Laravel's convention
    protected $table = 'transaksis';  // This is optional, only needed if your table doesn't follow Laravel's naming convention.

    // Fillable attributes for mass assignment
    protected $fillable = [
        'mobil_id',    // foreign key to Mobil table
        'user_id',     // foreign key to User table
        'rental_days', // duration of rental in days
        'total_cost',  // total rental cost
        'status',      // status of the transaction
    ];

    // Define casting for attributes
    protected $casts = [
        'total_cost' => 'decimal:2',  // Cast total_cost to a decimal with two decimal points
        'rental_days' => 'integer',   // Cast rental_days to an integer
    ];

    // Define the relationship with the Mobil model (each transaction belongs to one mobil)
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);  // Belongs to relationship
    }

    // Define the relationship with the User model (each transaction belongs to one user)
    public function user()
    {
        return $this->belongsTo(User::class);  // Belongs to relationship
    }
}
