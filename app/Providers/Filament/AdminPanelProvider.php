<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Enums\DatabaseNotificationsPosition;
use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Css;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
{
    FilamentAsset::register([
        Css::make(
            'custom-admin-style',
            asset('css/custom-admin.css')
        ),
    ]);

    return $panel
        ->default()
        ->id('admin')
        ->favicon(asset('images/icon S.svg'))
        ->brandName('SkillStore Admin')
        ->path('admin')

        ->sidebarCollapsibleOnDesktop()
        ->sidebarWidth('15rem')

        ->icons([
            'panels::sidebar.collapse-button' => 'heroicon-o-bars-3',
            'panels::sidebar.expand-button' => 'heroicon-o-bars-3',
        ])

        ->login()

        ->maxContentWidth('full')

        ->colors([
            'primary' => Color::Blue,
            'secondary' => Color::Slate,
        ])

        ->discoverResources(
            in: app_path('Filament/Resources'),
            for: 'App\\Filament\\Resources'
        )

        ->discoverPages(
            in: app_path('Filament/Pages'),
            for: 'App\\Filament\\Pages'
        )

        ->pages([
            Dashboard::class,
        ])

        ->discoverWidgets(
            in: app_path('Filament/Widgets'),
            for: 'App\\Filament\\Widgets'
        )

        ->widgets([])

        ->databaseNotifications(
            position: DatabaseNotificationsPosition::Sidebar
        )

        ->databaseNotificationsPolling('30s')

        ->middleware([
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            PreventRequestForgery::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ])

        ->authMiddleware([
            Authenticate::class,
        ]);
}
}