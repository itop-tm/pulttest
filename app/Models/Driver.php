<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'drivers_vehicles');
    }

    public function assign(Vehicle $v)
    {
      $this->vehicles()->save($v);
    }
}