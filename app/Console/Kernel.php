<?php

namespace App\Console;

use App\Mail\HurakMail;
use App\Models\Box;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->call(function () {
            $students = json_decode(file_get_contents(storage_path() . "/students.json"), true);

            if ($students['students'][0]['value'] === 9) {
                $students['students'][0]['value'] = 1;
                $newJsonString = json_encode($students, JSON_PRETTY_PRINT);
                file_put_contents(storage_path() . "/students.json", stripslashes($newJsonString));
                Box::truncate();
                $email = 'webdevelopers@hurak.co.uk';
                $details = [
                    'title' => 'Hurak first task using Vue.js version 2',
                    'url' => 'http//www.hurak.com'
                ];
                \Mail::to($email)->send(new HurakMail($details));
                return "";
            }

            $emptyArrayForHtml = [];
            if (($students['students'][0]['value'] > 0) && ($students['students'][0]['value'] < 16)) {
                $before = $students['students'][0]['value'];
                $value = ($students['students'][0]['value']) * 2;
                for ($before = 1; $before <= $value; $before++) {
                    $width = "100px";
                    $height = "40px";
                    $color = $this->randomColor();
                    $html = "<div style='border:1px solid $color;height:40px;width:100px;'></div>";
                    $emptyArrayForHtml[] = $html;
                }

                $students['students'][0]['value'] += 1;
                $newJsonString = json_encode($students, JSON_PRETTY_PRINT);
                file_put_contents(storage_path() . "/students.json", stripslashes($newJsonString));
                $html = json_encode($emptyArrayForHtml);
                $array = ["width" => $width, "height" => $height, "color" => $color, 'data' => $html];
                Box::crtd($array);
                echo "runned";
            }
        })->everyMinute();
    }

    public function randomColor()
    {
        $chars = 'ABCDEF0123456789';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $color;
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
