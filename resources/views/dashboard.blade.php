<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8 container bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class=" flex flex-wrap justify-center gap-4"> <!-- Contenedor flexible -->
                    <div class="pb-2 flex-grow">
                        <h1 class="py-3 text-xl bg-green-500 text-dark-emphasis font-bold container text-center">INGRESOS
                        </h1>
                        <table class="table-auto border-collapse border border-gray-300 text-center w-full mb-4 rounded">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">FECHA</th>
                                    <th class="border border-gray-300 px-4 py-2">CATEGORIA</th>
                                    <th class="border border-gray-300 px-4 py-2">DESCRIPCION</th>
                                    <th class="border border-gray-300 px-4 py-2">VALOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingresos as $ingreso)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ingreso->fecha }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ingreso->categoria->name }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-capitalize">
                                            {{ $ingreso->descripcion }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ingreso->monto }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{--  {{ $ingresos->links() }}  --}}
                    </div>

                    <div class="pb-4 flex-grow">
                        <h4 class="py-3 text-xl bg-orange-500 text-dark-emphasis font-bold container text-center">GASTOS
                        </h4>
                        <table
                            class="table-auto border-collapse border border-gray-300 text-center w-full mb-4 rounded">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">FECHA</th>
                                    <th class="border border-gray-300 px-4 py-2">CATEGORIA</th>
                                    <th class="border border-gray-300 px-4 py-2">DESCRIPCION</th>
                                    <th class="border border-gray-300 px-4 py-2">VALOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gastos as $gasto)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $gasto->fecha }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $gasto->categoria->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-capitalize">
                                            {{ $gasto->descripcion }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $gasto->monto }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{--  {{ $gastos->links() }}  --}}
                    </div>
                </div>

                <br>
                <hr>
                <br>

                <div class="text-center bg-indigo-600 text-white rounded py-5 font-bold">
                    <h3 class="text-3xl text-uppercase">Saldo Disponible = {{ $ingreso->monto - $gasto->monto }} </h3>
                </div>

                <div class="containerCanvas">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        new Chart(document.getElementById('myChart'), {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach ($grafica as $datos)
                        '{{ $datos->categoria }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Monto gastado por Categoria',
                    data: [
                        @foreach ($grafica as $datos)
                            {{ $datos->monto }},
                        @endforeach
                    ],
                }],
            }
        });
    </script>

    <style>
        .containerCanvas {
            width: 100%;
            max-width: 500px; /* Ajusta el tamaño máximo según sea necesario */
            height: auto;
            margin: 0 auto; /* Centra el contenedor */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        #myChart {
            width: 100%;
            height: auto;
            box-sizing: border-box;
        }
        
    </style>
</x-app-layout>
