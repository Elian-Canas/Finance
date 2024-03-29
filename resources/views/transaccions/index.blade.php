<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Home') }}

            <a href="{{ route('transaccions.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="container text-center w-full mb-4 ">
                        <thead>
                            <tr>
                                <th>FECHA</th>
                                <th>CATEGORIA</th>
                                <th>DESCRIPCION</th>
                                <th>VALOR</th>
                                <th>TIPO</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>

                        @forelse ($transaccions as $transaccion)
                            {{-- @dd(auth()->user()->name) --}}

                            <tbody>
                                <tr>
                                    <td class="px-6 py-4">{{ $transaccion->fecha }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $transaccion->categoria->name }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $transaccion->descripcion }}</td>
                                    <td class="px-6 py-4">{{ $transaccion->monto }}</td>
                                    <td class="px-6 py-4 capitalize ">{{ $transaccion->tipo }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('transaccions.edit', $transaccion) }}" class="text-indigo-600">Editar</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('transaccions.destroy', $transaccion) }}" method="POST">
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

                            {{-- <tr class="border-b border-gray-200 text-sm">
                            Upps! no hay ninguna publicacion disponible
                        </tr> --}}
                        @endforelse

                    </table>
                    {{-- {{ $transaccions->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
