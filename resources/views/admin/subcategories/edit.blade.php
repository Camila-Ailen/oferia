<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Inicio',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subategorías',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => $subcategory->name,
    ],
]">

    @livewire('admin.subcategories.subcategory-edit', ['subcategory' =>$subcategory])


</x-admin-layout>