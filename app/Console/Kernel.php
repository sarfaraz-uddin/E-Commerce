<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\DeliveryTracking;


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
            try {
                $deliveryTrackings = DeliveryTracking::where('status', 'processing')->get();
                foreach ($deliveryTrackings as $deliver) {
                    $now = Carbon::now();
                    $established = Carbon::parse($deliver->date);
                    $difference = $now->diffInSeconds($established);
                    if ($difference >= 10) {
                        $deliver->status = 'shipping';
                        $deliver->save();
                    }
                }
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        })->everyMinute();
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
