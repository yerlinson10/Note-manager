<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear nota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 style="font-size: 2rem;">{{ __("Formulario para crear una nueva nota") }}</h1>

                    <form action="" method="post">
                        <div class="flex flex-col">
                          <x-input-label for="title">{{ __("Título") }}</x-input-label>
                          <x-text-input class="text-orange-500" placeholder="Escribe un título para tu nota" name="title" id="title" />
                        </div>
                        <div class="flex flex-col">
                          <x-input-label for="content">{{ __("Contenido") }}</x-input-label>
                          <x-textarea-input class="border rounded px-3 py-2" placeholder="Escribe el contenido de tu nota" name="content" id="content"></x-textarea-input>
                        </div>
                        <br>
                        <x-primary-button type="submit" >
                          {{ __("Guardar") }}
                        </x-primary-button>
                      </form>
                      
{{--                     
                    <x-secondary-button id="hola">click</x-secondary-button>
                    <x-primary-button>hola</x-primary-button>
                    <x-input-error messages="es hoy?"></x-input-error >
                    <x-danger-button id="hola">click</x-danger-button>
                    <label for=""></label> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
