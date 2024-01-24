<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Categorias') }}

            <a href="{{ route('categorias.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 justify-between">

                    <table class=" container text-center mb-4">
                        <thead class="items-center justify-between">
                            <tr>
                                <th scope="col">CATEGORIA</th>
                                <th scope="col">EDITAR</th>
                                <th scope="col">ELIMINAR</th>
                            </tr>
                        </thead>

                        @forelse ($categorias as $categoria)
                            {{-- @dd(auth()->user()->name) --}}

                            <tbody>
                                <tr>
                                    <td class="px-6 py-4">{{ $categoria->name }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('categorias.edit', $categoria) }}"
                                            class="text-indigo-600">Editar</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Eliminar"
                                                class="bg-gray-800 text-white rounded px-4 py-2"
                                                onclick="return confirm('Desea Eliminar?')">
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <tbody>
                                <tr class="border-b border-gray-200 text-sm">
                                    Upps! no hay ninguna publicacion disponible
                                </tr>
                            </tbody>
                        @endforelse

                    </table>
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
