<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <x-partials._sidenavbar /> <!-- Include the side navbar component -->
            </div>
            <div class="col-md-9">
            <livewire:dashboard-table />
            </div>
        </div>
    </div>
</x-layout>
