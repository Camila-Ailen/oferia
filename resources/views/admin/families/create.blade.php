<x-admin-layout>

    <x-card>

        <form action="{{ route('admin.families.store') }}" method="POST">
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input 
                    class="w-full" 
                    placeholder="Nombre de la familia"
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
