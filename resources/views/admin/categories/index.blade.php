<x-admin-layout>

    <div class="flex justify-end mb-4">
        <x-a href="{{ route('admin.categories.create') }}">
            Nuevo
        </x-a>
    </div>



    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $category->id }} 
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-end">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                            class="btn btn-blue">
                            Editar
                        </a>
                        </div>
                    </td>
                </tr>
                    
                @endforeach
                
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}


</x-admin-layout>
