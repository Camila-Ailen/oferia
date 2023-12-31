<div>

    <form wire:submit="store">

    
        <figure class="mb-4 relative">

            <div class="absolute top-8 right-8">
                <label class="flex items-center px-4 py-2 rounded-lg bg-white cursor-pointer text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen

                    <input type="file" 
                        class="hidden" 
                        accept="image/*"
                        wire:model="image">
                </label>
            </div>


            <img class="aspect-[16/9] object-cover object-center w-full" 
                src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path']) }}" 
                alt="">
        </figure>

        <x-validation-errors class="mb-4" />


        <div class="card">

            {{-- Campo de codigo --}}
            <div class="mb-4">
                <x-label class="mb-1">
                    Código
                </x-label>
        
                <x-input wire:model="productEdit.sku" 
                    class="w-full"
                    placeholder="Por favor ingrese el codigo del producto" />
            </div>
        
            {{-- Campo de nombre --}}
            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
        
                <x-input wire:model="productEdit.name" 
                    class="w-full"
                    placeholder="Por favor ingrese el nombre del producto" />
            </div>
        
            {{-- Campo de descripcion --}}
            <div class="mb-4">
                <x-label>
                    Descripción
                </x-label>
        
                <x-textarea 
                    wire:model="productEdit.description" 
                    class="w-full"
                    placeholder="Por favor ingrese la descripción del producto">
                </x-textarea>
            </div>
        
            {{-- Lista desplegable de familia --}}
            <div class="mb-4">
                <x-label>
                    Familia
                </x-label>
        
                <x-select class="w-full" wire:model.live="family_id">
        
                    <option value="" disabled>
                        Seleccione una familia
                    </option>
        
                    @foreach ($families as $family)
                        
                        <option value="{{ $family->id }}">
                            {{ $family->name }}
                        </option>
        
                    @endforeach
                </x-select>
            
            
            </div>
        
            {{-- Lista desplegable de categoria --}}
            <div class="mb-4">
                <x-label>
                    Categoria
                </x-label>
        
                <x-select class="w-full" wire:model.live="category_id">
        
                    <option value="" disabled>
                        Seleccione una categoria
                    </option>
        
                    @foreach ($this->categories as $category)
                        
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
        
                    @endforeach
                </x-select>
            
            
            </div>
        
            {{-- Lista desplegable de subcategoria --}}
            <div class="mb-4">
                <x-label>
                    Subcategoria
                </x-label>
        
                <x-select class="w-full" wire:model.live="productEdit.subcategory_id">
        
                    <option value="" disabled>
                        Seleccione una subcategoria
                    </option>
        
                    @foreach ($this->subcategories as $subcategory)
                        
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </option>
        
                    @endforeach
                </x-select>
            </div>

            {{-- Campo de precio --}}
            <div class="mb-4">
                <x-label class="mb-1">
                    Precio
                </x-label>
        
                <x-input 
                    type="number"
                    step="0.01"
                    wire:model="productEdit.price" 
                    class="w-full"
                    placeholder="Por favor ingrese el precio del producto" />
            </div>
            
            {{-- Boton para actualizar y eliminar --}}
            <div class="flex justify-end">
                <x-danger-button class="mr-2" onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>


                <x-button>
                    Actualizar
                </x-button>
            </div>
        
        </div>

    </form>

    <form 
        action="{{ route('admin.products.destroy', $product) }}" 
        method="POST"
        id="destroyForm">
        @csrf
        @method('DELETE')

    </form>

    {{-- Confirmacion de eliminar --}}
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

