<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Device;

class DeviceLocationCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Pegando o device daquele respectivo ID
        $device = Device::find(1); 

        $deviceLocations = $device->deviceLocations()->create([
            'latitude' => '-22.316824657013566',
            'longitude' => '-41.69914600433294',
            'temperature' => '155555',
            'salinity' => '',
        ]);  

        return Command::SUCCESS;
    }
}
