<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Native\Laravel\Facades\MenuBar;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        MenuBar::create()
            ->height(800)
            ->width(600)
            ->minHeight(800)
            ->minWidth(600)
            ->maxHeight(800)
            ->maxWidth(600)
            ->icon(base_path('resources/icons/MenuBarIconTemplate.png'));

        Artisan::call('app:update-time');

        /**
         * GlobalShortcut::new()
         * ->key('CmdOrCtrl+Shift+I')
         * ->event(ShortcutPressed::class)
         * ->register();
         */
    }
}
