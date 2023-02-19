<?php

namespace App\Helpers;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceLocationHelper extends Factory
{
    //Método para gerar uma latitude aleatória entre esses dois números
    public static function generateGenericLatitudeBetween($a, $b)
    {                    
      return fake()->latitude($a, $b);
    }

    //Método para gerar uma longitude aleatória entre esses dois números
    public static function generateGenericLongitudeBetween($a, $b)
    {                    
      return fake()->longitude($a, $b);
    }   

}