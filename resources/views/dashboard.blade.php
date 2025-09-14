<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- welcome es un componente que se inyecta con la instruccion de abajo --}}
                {{-- <x-welcome /> --}}

                <div class="space-y-10 p-6">
                    <section class="max-w-prose mx-auto bg-gray-100 p-6 rounded-lg">
                        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
                        <p>Bienvenido al dashboard de la aplicación en Laravel con jetstream. Los repositorios del usuario estan en la pestaña repositorios del menu de navegacion</p>
                    </section>

                    <!-- Texto con max-w-7xl (muy ancho, incómodo en pantallas grandes) -->
                    <section class="max-w-7xl mx-auto bg-gray-100 p-6 rounded-lg">
                        <h2 class="text-xl font-bold mb-4">Texto con max-w-7xl</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec sapien at
                            turpis feugiat egestas. Aliquam erat volutpat. Morbi vel fermentum purus.
                            Pellentesque tincidunt, velit non porttitor dictum, augue ligula suscipit
                            neque, in maximus lectus sem nec leo.
                        </p>
                    </section>

                    <!-- Texto con max-w-prose (más cómodo para leer) -->
                    <section class="max-w-prose mx-auto bg-gray-100 p-6 rounded-lg">
                        <h2 class="text-xl font-bold mb-4">Texto con max-w-prose</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec sapien at
                            turpis feugiat egestas. Aliquam erat volutpat. Morbi vel fermentum purus.
                            Pellentesque tincidunt, velit non porttitor dictum, augue ligula suscipit
                            neque, in maximus lectus sem nec leo.
                        </p>
                    </section>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
