<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Categorias') }}

            <a href="{{ route('categorias.create') }}" class="text-xs bg-blue-700 text-white rounded px-6 py-2">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 justify-between">

                    <table class=" container text-center w-full mb-4 table-fixed">
                        <thead class="">
                            <tr>
                                <th class="w-1/3">CATEGORIA</th>
                                <th class="w-1/3">EDITAR</th>
                                <th class="w-1/3">ELIMINAR</th>
                            </tr>
                        </thead>

                        @forelse ($categorias as $categoria)
                            {{-- @dd(auth()->user()->name) --}}

                            <tbody>
                                <tr>
                                    <td class="px-6 py-4 capitalize ">{{ $categoria->name }}</td>
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
                    {{-- {{ $categorias->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
