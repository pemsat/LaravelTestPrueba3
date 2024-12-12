{{-- <div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Bienvenido {{ $user }}</h3>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    tienes {{ $tasks->count() }} tarea/s creada/s
                </div>

                

            </div>

        </div>
    </div>
</div> --}}


<!-- component-->
<div class="px-3 py-4 flex justify-center">
    <button type="button"
    class="bg-purple-800 text-white px-4 py-2 rounded-md hover:bg-purple-700 mt-6"
    wire:click="openCreateModal">Nueva Tarea</button>
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <thead class="border-b">
                <th class="text-left p-3 px-5">Titulo</th>
                <th class="text-left p-3 px-5">Descripción</th>
                <th class="text-left p-3 px-5">Acciones</th>
            </thead>
            <tbody>


                @foreach ($tasks as $task)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="p-3 px-5">{{ $task->title }}</td>
                        <td class="p-3 px-5"> {{ $task->description }}</td>
                        <td class="p-3 px-5 flex justify-start gap-3">
                            <button type="button"
                                class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" wire:click="openCreateModal">Editar</button>
                            <button type="button"
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Borrar</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    @if($modal)
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
            <div class="w-full">
                <div class="m-8 my-20 max-w-[400px] mx-auto">
                    <div class="mb-8">
                        <h1 class="mb-4 text-3xl font-extrabold">Crear nueva tarea</h1>
                        <form>
                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                                    <input type="text" wire:model="title" name="title" id="title"
                                        autocomplete="title"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <textarea type="text" wire:model="description" name="description" id="description" autocomplete="description"
                                        rows="3"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="space-y-4">
                        <button class="p-3 bg-black rounded-full text-white w-full font-semibold"
                        wire:click="createTask">
                            Crear tarea
                        </button>
                        <button class="p-3 bg-white border rounded-full w-full font-semibold"
                        wire:click="closeCreateModal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    
</div>

    