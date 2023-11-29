<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $product;
    public $productEdit;

    public $families;
    public $family_id = '';
    public $category_id = '';

    public $image;

    public function mount($product)
    {
        $this->productEdit = $product->only('sku', 'name', 'description', 'price', 'image_path', 'subcategory_id');

        $this->families = Family::all();

        $this->category_id = $product->subcategory->category->id;
        $this->family_id = $product->subcategory->category->family->id;
    }

    // verifica errores de validacion
    public function boot()
    {
        $this->withValidator(function ($validator) {
            
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => 'Oops...',
                    'text' => 'Algo salió mal!',
                ]);
            }

        });
    }

    // verifica si se cambia la familia
    public function updatedFamilyId($value)
    {
        $this->category_id = '';
        $this->productEdit['subcategory_id'] = '';
    }

    // verifica si se cambia la categoria
    public function updatedCategoryId($value)
    {
        $this->productEdit['subcategory_id'] = '';
    }

    // devuelve la categoria de la familia seleccionada
    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->get();
    }

    // devuelve las subcategorias de la categoria seleccionada
    #[Computed()]
    public function subcategories()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function store()
    {
        // validaciones
        $this->validate([
            'image' => 'nullable|image|max:1024',
            'productEdit.sku' => 'required|unique:products,sku,' . $this->product->id,
            'productEdit.name' => 'required|max:255',
            'productEdit.description' => 'nullable',
            'productEdit.price' => 'required|numeric|min:0',
            'productEdit.subcategory_id' => 'required|exists:subcategories,id',   
        ],[],[
            'productEdit.sku' => 'del codigo',
            'productEdit.name' => 'nombre',
            'productEdit.description' => 'descripción',
            'productEdit.price' => 'precio',
            'productEdit.subcategory_id' => 'subcategoría',
        ]);

        // actualizacion de imagen
        if ($this->image) {
            Storage::delete($this->productEdit['image_path']);
            $this->productEdit['image_path'] = $this->image->store('products');
        }

        $this->product->update($this->productEdit);

        // mensaje
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Producto actualizado',
            'text' => 'El producto se actualizó correctamente',
        ]);

        // redireccion
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
