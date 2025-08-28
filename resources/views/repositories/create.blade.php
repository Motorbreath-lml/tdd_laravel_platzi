<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repositorios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('repositories.store')}}" method="POST" class="max-w-md">
                    @csrf
                    
                    <label for="url" class="block font-medium text-sm text-gray-700">
                        {{ __('Enlace del Repositorio') }}
                    </label>
                    <input type="text" name="url" id="url" class="form-input w-full rounded-md shadow-sm"/>

                    <label for="description" class="block font-medium text-sm text-gray-700">
                        {{ __('Descripcion del Repositorio') }}
                    </label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-input w-full rounded-md shadow-sm">

                    </textarea>
                    <hr class="my-4">

                    <input type="submit" value="Guardar" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>