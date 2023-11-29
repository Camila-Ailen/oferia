<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Inicio',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Opciones',
    ],
]">

    @livewire('admin.options.manage-options')


</x-admin-layout>