<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <!-- CRUD for Books -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __('Libros') }}</h3>

                    <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 mb-4 inline-block">{{ __('Agregar Libro') }}</a>

                    @if ($message = Session::get('book_success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ $message }}
                        </div>
                    @endif

                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Título') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Autor') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('ISBN') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Descripción') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700" width="200px">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $book->title }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $book->author }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $book->isbn }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $book->description }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        <a href="{{ route('books.edit', $book->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2">{{ __('Editar') }}</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">{{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- CRUD for Users -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __('Usuarios') }}</h3>

                    @if ($message = Session::get('user_success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ $message }}
                        </div>
                    @endif

                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Nombre') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Correo Electrónico') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Rol') }}</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $user->email }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $user->role }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2">{{ __('Editar') }}</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">{{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
