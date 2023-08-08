<?php

namespace App\Console\Commands;

use App\Models\TrackedTZ;
use Illuminate\Console\Command;
use Native\Laravel\Facades\MenuBar;

class UpdateTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the time in the MenuBar';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $inMenuBar = TrackedTZ::where('show_in_menubar', true)->get();

        if ($inMenuBar->count() > 0) {

            $label = ' ';
            $counter = 0;

            foreach ($inMenuBar as $time) {
                $label .= $time->getCurrentTime();
                $label .= ' ';
                $label .= $time->getShortTimeZoneName();

                $counter++;
                if ($counter < $inMenuBar->count()) {
                    $label .= ' | ';
                }
            }

            MenuBar::label($label);
        } else {
            MenuBar::label('');
        }
    }
}
