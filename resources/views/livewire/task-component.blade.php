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
<div class="container mx-auto" wire:poll="getTask">
    <div class="p-4 text-gray-900 dark:text-gray-100">
        <h1 class="mb-8">
            Bienvenido, {{ $user }}
        </h1>
    </div>

    <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 my-4"
        wire:click="openCreateModal">Nueva Tarea</button>

    <table class="text-left w-full">
        <thead class="bg-black flex text-white w-full">
            <tr class="flex w-full mb-4">
                <th class="p-4 w-1/4">Título</th>
                <th class="p-4 w-1/4">Descripción</th>
                <th class="p-4 w-1/4">Acciones</th>
            </tr>
        </thead>

        <tbody class="bg-grey-light flex flex-col items-center justify-between w-">

            @foreach ($tasks as $task)
                <tr class="flex w-full mb-">
                    <td class="p-4 w-1/4">{{ $task->title }}</td>
                    <td class="p-4 w-1/4">{{ $task->description }}</td>
                    <td class="p-4 w-1/2">
                        @if ((isset($task->pivot) && $task->pivot->permission == 'edit') || auth()->user()->id == $task->user_id)
                            <button type="button"
                                class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                wire:click="openCreateModal({{ $task }})">Editar</button>
                            <button type="button"
                                class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                wire:click="openShareModal({{ $task }})">Compartir</button>
                            <button type="button"
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                wire:click="deleteTask({{ $task }})"
                                wire:confirm="¿Está seguro? esta acción no se puede deshacer">Borrar</button>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($modal)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">
                                {{ isset($this->editingTask->id) ? 'Actualizar' : 'Crear Nueva' }} tarea
                            </h1>
                            <form>
                                <div class="space-y-4">
                                    <div>
                                        <label for="title"
                                            class="block text-sm font-medium text-gray-700">Título</label>
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
                                {{ isset($this->editingTask->id) ? 'Actualizar' : 'Crear' }}
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

    @if ($modalShare)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">
                                Compartir tarea
                            </h1>
                            <form>
                                <div class="space-y-4">
                                    <div>
                                        <label for="user_id"
                                            class="block text-sm font-medium text-gray-700">Ususario</label>
                                        <select name="" id="user_id" wire:model="user_id">
                                            <option value="">Selecciona un usuario</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="permission"
                                            class="block text-sm font-medium text-gray-700">Permiso</label>
                                        <select type="text" wire:model="permission" id="permission"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option value="">Selecciona un permiso</option>
                                            <option value="view">Vista</option>
                                            <option value="edit">Edición</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="space-y-4">
                            <button class="p-3 bg-black rounded-full text-white w-full font-semibold"
                                wire:click="shareTask">
                                Compartir tarea
                            </button>
                            <button class="p-3 bg-white border rounded-full w-full font-semibold"
                                wire:click="closeShareModal">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
