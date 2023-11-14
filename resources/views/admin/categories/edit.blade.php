<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categories',
        'route' => route('admin.categories'),
    ],
    [
        'name' => 'Edit',
],
]">

    <x-card>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>

                <x-input class="w-full" placeholder="Nombre de la categoria" name="name"
                    value="{{ old('name', $category->name) }}" />

                {{-- <x-input-error for="name" class="mt-2" /> --}}
            </div>

            <div class="flex justify-end">
                <x-danger-button class="mr-2" onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>


                <x-button>
                    Actualizar
                </x-button>
            </div>
        </form>

    </x-card>

    <form 
        action="{{ route('admin.categories.destroy', $category) }}" 
        method="POST"
        id="destroyForm">
        @csrf
        @method('DELETE')


    
    </form>

    @push('js')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Estas seguro?",
                    text: "No podras revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire({
                        //     title: "Deleted!",
                        //     text: "Your file has been deleted.",
                        //     icon: "success"
                        // });
                        document.getElementById('destroyForm').submit();
                    }
                });
            }
        </script>
    @endpush

</x-admin-layout>
