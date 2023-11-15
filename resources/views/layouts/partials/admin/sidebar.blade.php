@php
    $links = [
        //Dashboard
        [
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
            'icon' => 'fa fa-home',
            'name' => 'Inicio',
        ],
        //Familias de productos
        [
            'route' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*'),
            'icon' => 'fa fa-box-open',
            'name' => 'Familias',
        ],
        //Categorias de productos
        [
            'route' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
            'icon' => 'fa fa-tags',
            'name' => 'Categorías',
        ],
    ];

@endphp


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-neutral
-200 sm:translate-x-0 dark:bg-neutral
-800 dark:border-neutral
-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-neutral-800">
        <ul class="space-y-2 font-medium">



            @foreach ($links as $link)
               
                <li>

                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-neutral
-900 rounded-lg dark:text-green-200 hover:bg-neutral
-100 dark:hover:bg-neutral
-700 group {{ $link['active'] }} ? dark:bg-green-800 : '' }}">

                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $link['icon'] }} text-neutral
-500"></i>
                        </span>

                        <span class="ml-2">
                            {{ $link['name'] }}
                        </span>
                    </a>

                </li>
            @endforeach

        </ul>
    </div>
</aside>
