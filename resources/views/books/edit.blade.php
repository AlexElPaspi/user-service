<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Título') }}</label>
                            <input type="text" name="title" value="{{ $book->title }}" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Autor') }}</label>
                            <input type="text" name="author" value="{{ $book->author }}" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ISBN') }}</label>
                            <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Descripción') }}</label>
                            <textarea name="description" class="form-input w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300">{{ $book->description }}</textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Guardar Cambios') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
