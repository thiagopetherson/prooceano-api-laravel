<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Device;
use App\Helpers\DeviceLocationHelper; // Chamando o helper

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
        
        // Pegando coordenadas aleatórias
        $atlasCoords = DeviceLocationHelper::generateValidCordinatesAtlas();

        $deviceLocations = $device->deviceLocations()->create([            
            'latitude' => $atlasCoords[0],
            'longitude' => $atlasCoords[1],
            'temperature' => rand(10, 30),
            'salinity' => '',
        ]);

        // Pegando o device daquele respectivo ID
        $device = Device::find(2); 
        
        // Pegando coordenadas aleatórias
        $baleiaCoords = DeviceLocationHelper::generateValidCordinatesBaleia();

        $deviceLocations = $device->deviceLocations()->create([        
            'latitude' => $baleiaCoords[0],
            'longitude' => $baleiaCoords[1],
            'temperature' => '',
            'salinity' => rand(30, 38),
        ]);

        return Command::SUCCESS;
    }
}
