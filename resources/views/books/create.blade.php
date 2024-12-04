<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Título') }}</label>
                            <input type="text" name="title" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Autor') }}</label>
                            <input type="text" name="author" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ISBN') }}</label>
                            <input type="text" name="isbn" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Descripción') }}</label>
                            <textarea name="description" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Guardar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
