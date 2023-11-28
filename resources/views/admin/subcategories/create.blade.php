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
        'name' => 'Nuevo',
    ],
]">

    <x-card>

        {{-- <form action="{{ route('admin.subcategories.store') }}" method="POST">
            @csrf

           

            <div class="mb-4">
                <x-label class="mb-2">
                    Categorias
                </x-label>

                <x-select name="category_id" class="w-full">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            @selected(old('category_id') == $category->id)>
                            {{$category->name}}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input class="w-full" 
                        placeholder="Nombre de la subcategoria" 
                        name="name" 
                        value="{{ old('name') }}" />

            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear
                </x-button>
            </div>
        </form> --}}

        @livewire('admin.subcategories.subcategory-create')

    </x-card>

</x-admin-layout>
