<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repositorios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-right mb-4">
                <a href="{{ route('repositories.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md text-xs">
                    {{ __('Crear Repositorio') }}
                </a>
            </p>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Enlace</th>
                            <th>&nbsp;</th> 
                            <th>&nbsp;</th> 
                            {{-- Coloca un espacio --}}
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($repositories as $repository)
                            <tr>    
                                <td class="border px-4 py-2">{{ $repository->id }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ $repository->url }}" target="_blank">
                                        {{ $repository->url }}
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('repositories.show', $repository->id) }}" class="text-blue-500 hover:underline">
                                        Ver Detalles
                                    </a>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('repositories.edit', $repository->id) }}" class="text-blue-500 hover:underline">
                                        Editar
                                    </a>
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('repositories.destroy', $repository->id) }}" method="POST"">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="px-4 rounded-md bg-red-500 text-white">
                                    </form>
                                </td>
                            </tr>                            
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay repositorios para mostrar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>