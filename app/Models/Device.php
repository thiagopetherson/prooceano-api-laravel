<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DeviceLocation;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    // Relationship Methods
    
    public function deviceLocations()
    {
        return $this->hasMany(DeviceLocation::class);
    }

}
