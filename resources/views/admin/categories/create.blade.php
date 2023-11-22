<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Inicio',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorías',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Crear',
    ],
]">

    <x-card>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <x-label class="mb-2">
                    Familia
                </x-label>

                <x-select name="family_id" class="w-full">
                    @foreach ($families as $family)
                        <option value="{{$family->id}}"
                            @selected(old('family_id') == $family->id)>
                            {{$family->name}}
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
                        placeholder="Nombre de la categoria" 
                        name="name" 
                        value="{{ old('name') }}" />

                {{-- <x-input-error for="name" class="mt-2" /> --}}
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear
                </x-button>
            </div>
        </form>

    </x-card>

</x-admin-layout>
