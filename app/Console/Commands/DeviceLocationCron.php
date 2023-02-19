<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Faker\Generator as Faker;
use App\Models\Device;

class DeviceLocationCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deviceLocation:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pegando Coordenadas dos Equipamentos';

    public function __construct()
    {
        parent::__construct();        
    }   

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {       
        // Pegando o device daquele respectivo ID
        $device = Device::find(1); 
        $faker = new Faker;

        $deviceLocations = $device->deviceLocations()->create([            
            'latitude' => $faker->latitude(-22.584269,-22.404153),
            'longitude' => $faker->longitude(-41.752995, -41.289535),
            'temperature' => rand(10, 30),
            'salinity' => '',
        ]);

        // Pegando o device daquele respectivo ID
        $device = Device::find(2); 

        $deviceLocations = $device->deviceLocations()->create([        
            'latitude' => $faker->latitude(-23.337706,-23.072650),
            'longitude' => $faker->longitude(-41481670, -42.189336),
            'temperature' => '',
            'salinity' => rand(30, 38),
        ]);

        return Command::SUCCESS;
    }
}
