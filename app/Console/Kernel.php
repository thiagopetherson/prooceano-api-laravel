<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Device;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {

             // Pegando o device daquele respectivo ID
            $device = Device::find(1);

            $deviceLocations = $device->deviceLocations()->create([
                'latitude' => '5.84695410560674',
                'longitude' => '-55.186949423385705',
                'temperature' => '15555',
                'salinity' => '',
            ]);     
           
        })->daily();    
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
