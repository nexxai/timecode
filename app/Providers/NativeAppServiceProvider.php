<?php

namespace App\Providers;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        MenuBar::create()
            ->width(400)
            ->height(600);

        Menu::new()
            ->appMenu()
            ->submenu('About2', Menu::new()
                ->link('https://nativephp.com', 'NativePHP')
            )
            ->submenu('View', Menu::new()
                ->toggleFullscreen()
                ->separator()
                ->toggleDevTools()
            )
            ->register();

        Window::open()
            ->width(800)
            ->height(800);

        /**
         * GlobalShortcut::new()
         * ->key('CmdOrCtrl+Shift+I')
         * ->event(ShortcutPressed::class)
         * ->register();
         */
    }
}
