<x-filament-widgets::widget>
    <x-filament::section>

        <x-slot name="heading">
            🔔 Notification Center
        </x-slot>

        @php
            $total = $pendingUsers + $pendingProjects + $todayProjects;
        @endphp

        @if ($total === 0)

            <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                <div class="font-semibold">
                    ✅ Tidak ada notifikasi
                </div>

                <div class="text-sm text-gray-600 mt-1">
                    Semua data sudah diproses.
                </div>
            </div>

        @else

            <div class="space-y-3">

                @if ($pendingUsers)

                    <div class="rounded-xl border p-4">
                        <div class="font-semibold text-warning-600">
                            🟡 {{ $pendingUsers }} User menunggu approval
                        </div>
                    </div>

                @endif

                @if ($pendingProjects)

                    <div class="rounded-xl border p-4">
                        <div class="font-semibold text-warning-600">
                            📁 {{ $pendingProjects }} Project menunggu review
                        </div>
                    </div>

                @endif

                @if ($todayProjects)

                    <div class="rounded-xl border p-4">
                        <div class="font-semibold text-info-600">
                            🆕 {{ $todayProjects }} project baru hari ini
                        </div>
                    </div>

                @endif

            </div>

        @endif

    </x-filament::section>
</x-filament-widgets::widget>