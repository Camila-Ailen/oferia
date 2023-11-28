<div class="card">

    <div class="mb-4">
        <x-label class="mb-1">
            Código
        </x-label>

        <x-input wire:model="product.sku" 
            class="w-full"
            placeholder="Por favor ingrese el codigo del producto" />
    </div>

    <div class="mb-4">
        <x-label>
            Nombre
        </x-label>

        <x-input wire:model="product.name" 
            class="w-full"
            placeholder="Por favor ingrese el nombre del producto" />
    </div>

    <div class="mb-4">
        <x-label>
            Descripción
        </x-label>

        <x-textarea 
            wire:model="product.description" 
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

        <x-select class="w-full" wire:model.live="product.subcategory_id">

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
