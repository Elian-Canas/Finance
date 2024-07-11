<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Detalles de cuenta') }}

            <a href="{{ route('transaccions.create') }}" class="text-xs bg-blue-700 text-white rounded px-6 py-2">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <table class="table table-striped table-bordered text-center w-full mb-4">
                        <thead>
                            <tr>
                                <th scope="col">FECHA</th>
                                <th scope="col">CATEGORIA</th>
                                <th scope="col">DESCRIPCION</th>
                                <th scope="col">VALOR</th>
                                <th scope="col">TIPO</th>
                                <th scope="col">EDITAR</th>
                                <th scope="col">ELIMINAR</th>
                            </tr>
                        </thead>

                        @forelse ($transaccions as $transaccion)
                            <tbody class="table-group-divider">
                                <tr>
                                    <td scope="row" class="px-6 py-4">{{ $transaccion->fecha }}</td>
                                    <td scope="row" class="px-6 py-4 capitalize">{{ $transaccion->categoria->name }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 capitalize">{{ $transaccion->descripcion }}</td>
                                    <td scope="row" class="px-6 py-4">{{ $transaccion->monto }}</td>
                                    <td scope="row" class="px-6 py-4 capitalize ">{{ $transaccion->tipo }}</td>
                                    <td scope="row" class="px-6 py-4">
                                        <a href="{{ route('transaccions.edit', $transaccion) }}"
                                            class="text-indigo-600">Editar</a>
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
                        @endforelse

                    </table>
                    {{-- {{ $transaccions->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
