<div>
    <form wire:submit="save">

        <x-validation-errors class="mb-4" />
    
        <div class="mb-4">
            <x-label class="mb-2">
                Familias
            </x-label>
    
            <x-select class="w-full" wire:model.live="subcategoryEdit.family_id">
                
                <option value="" disabled>
                    Seleccione una familia
                </option>
                
                @foreach ($families as $family)
                    <option value="{{$family->id}}">
                        {{$family->name}}
                    </option>
                @endforeach
            </x-select>
        </div>
    
    
        <div class="mb-4">
            <x-label class="mb-2">
                Categorias
            </x-label>


            <x-select name="category_id" class="w-full" wire:model.live="subcategoryEdit.category_id">
                <option value="" disabled>
                    Seleccione una categoria
                </option>
                
                @foreach ($this->categories as $category)
                    <option value="{{$category->id}}"
                        @selected(old('category_id') == $category->id)>
                        {{$category->name}}
                    </option>
                @endforeach
            </x-select>
        </div>
    
        
    
        <div class="mb-4">
            <x-label class="mb-1">
                Nombre
            </x-label>
            <x-input class="w-full" 
                    placeholder="Nombre de la subcategoria" 
                    wire:model="subcategoryEdit.name" />
    
        </div>
    
        <div class="flex justify-end">
            <x-danger-button class="mr-2" onclick="confirmDelete()">
                Eliminar
            </x-danger-button>

            <x-button class="ml-2">
                Actualizar
            </x-button>
        </div>
    </form>

    <form 
        action="{{ route('admin.subcategories.destroy', $subcategory) }}" 
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

</div>