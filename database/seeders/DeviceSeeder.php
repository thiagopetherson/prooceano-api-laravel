<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        // Device::factory()->create();
     
        Device::insert([
            [
                'name' => 'Equipamento Atlas',
                'description' => 'Medidor de temperatura da água',                
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Equipamento Baleia',
                'description' => 'Medidor de salinidade da água',                
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
