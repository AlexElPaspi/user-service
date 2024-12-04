<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nombre') }}</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Correo Electrónico') }}</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Contraseña (dejar en blanco para no cambiar)') }}</label>
                            <input type="password" name="password" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Rol') }}</label>
                            <select name="role" class="form-select w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                                <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>{{ __('Cliente') }}</option>
                                <option value="bibliotecario" {{ $user->role == 'bibliotecario' ? 'selected' : '' }}>{{ __('Bibliotecario') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Guardar Cambios') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
