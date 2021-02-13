<?php

namespace App\Console;

use App\Tasks\SendMinuteEmail;
use App\Tasks\SendTenMinutesEmail;
use App\Tasks\SendFiveMinutesEmail;
use App\Console\Commands\RunScheduler;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'Europe/Paris';
    }

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [RunScheduler::class];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(new SendMinuteEmail)
            ->everyMinute();

        $schedule->call(new SendFiveMinutesEmail)
            ->everyFiveMinutes();

        $schedule->call(new SendTenMinutesEmail)
            ->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
