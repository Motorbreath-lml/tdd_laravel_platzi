<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repositorios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('repositories.update', $repository)}}" method="POST" class="max-w-md">
                    @csrf
                    @method('PUT')
                    
                    <label for="url" class="block font-medium text-sm text-gray-700">
                        {{ __('Enlace del Repositorio') }}
                    </label>
                    <input type="text" name="url" id="url" value="{{ $repository->url }}" class="form-input w-full rounded-md shadow-sm"/>

                    <label for="descipcion" class="block font-medium text-sm text-gray-700">
                        {{ __('Descripcion del Repositorio') }}
                    </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-input w-full rounded-md shadow-sm">
                        {{ $repository->description }}
                    </textarea>

                    <hr class="my-4">

                    <input type="submit" value="Editar Repositorio" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>