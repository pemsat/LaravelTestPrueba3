<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col">
                    <h3>Bienvenido {{ $user }}</h3>
                    tienes {{ $tasks->count() }} tarea/s creada/s
                </div>
                
                @foreach ($tasks as $task)
                    <p>
                        <div class="mt-4 ms-6 text-lg text-purple-800 underline">
                            {{$task->title}}
                        </div>
                        <div class="mt-4 ms-6 text-lg text-purple-600">
                            {{$task->description}}
                        </div>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
