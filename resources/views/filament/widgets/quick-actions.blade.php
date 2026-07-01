<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Quick Actions
        </x-slot>

        <div style="display: grid !important; grid-template-columns: repeat(2, minmax(0, 1fr)) !important; width: 100% !important; gap: 1rem;" 
             class="md:!grid-cols-4">
            
            <x-filament::button 
                tag="a" 
                href="{{ \App\Filament\Resources\Projects\ProjectResource::getUrl() }}"
                icon="heroicon-o-folder"
                color="primary"
                size="md"
                style="width: 100% !important; justify-content: center !important;">
                Project
            </x-filament::button>

            <x-filament::button 
                tag="a" 
                href="{{ \App\Filament\Resources\Users\UserResource::getUrl() }}"
                icon="heroicon-o-users"
                color="info"
                size="md"
                style="width: 100% !important; justify-content: center !important;">
                Users
            </x-filament::button>

            <x-filament::button 
                tag="a" 
                href="{{ \App\Filament\Resources\Categories\CategoryResource::getUrl() }}"
                icon="heroicon-o-tag"
                color="success"
                size="md"
                style="width: 100% !important; justify-content: center !important;">
                Categories
            </x-filament::button>

            <x-filament::button 
                tag="a" 
                href="{{ \App\Filament\Resources\Projects\ProjectResource::getUrl() }}"
                icon="heroicon-o-clock"
                color="warning"
                size="md"
                style="width: 100% !important; justify-content: center !important;">
                Approval
            </x-filament::button>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>

<style>
    @media (min-width: 768px) {
        .md\:\!grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
        }
    }
</style>