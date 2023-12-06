
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/6618d2e822.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>


{{-- lista --}}
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-center rtl:text-right text-gray-500">
        <caption
            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
            LISTA DE CATEGORIAS
            <p class="mt-1 text-sm font-normal text-gray-500">
                Lista de todas las categorias registradas en el sistema junto a la familia asociada.
            </p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Familia
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->family->name }}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
