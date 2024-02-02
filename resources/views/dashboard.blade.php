<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="container px-4 mx-auto">
                        <div class="row align-items-start g-col-6">
                            <div class="">
                                <h4 class="py-3 text-dark-emphasis col-xl-8 container text-center">INGRESOS</h4>

                                <table class="table table-striped text-center ">
                                    <thead>
                                        <tr class="w-max p-2">
                                            <th scope="col">FECHA</th>
                                            <th scope="col">CATEGORIA</th>
                                            <th scope="col">DESCRIPCION</th>
                                            <th scope="col">VALOR</th>
                                            <th scope="col">TIPO</th>
                                        </tr>
                                    </thead>
                                    @foreach ($ingresos as $ingreso)
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    {{ $ingreso->fecha }}
                                                </th>
                                                <th scope="row">
                                                    {{ $ingreso->categoria->name }}
                                                </th>
                                                <td class="text-capitalize">
                                                    {{ $ingreso->descripcion }}
                                                </td>
                                                <th>
                                                    {{ $ingreso->monto }}
                                                </th>
                                                <td class="text-capitalize">
                                                    {{ $ingreso->tipo }}
                                                </td>
                                            </tr>
                                    @endforeach
                                </table>
                                {{ $ingresos->links() }}

                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="g-col-6">
                            <h4 class="py-3 text-dark-emphasis col-xl-4 container text-center">GASTOS</h4>

                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">FECHA</th>
                                        <th scope="col">CATEGORIA</th>
                                        <th scope="col">DESCRIPCION</th>
                                        <th scope="col">VALOR</th>
                                        <th scope="col">TIPO</th>
                                    </tr>
                                </thead>
                                @foreach ($gastos as $gasto)
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                {{ $gasto->fecha }}
                                            </th>
                                            <th scope="row">
                                                {{ $gasto->categoria->name }}
                                            </th>
                                            <td class="text-capitalize">
                                                {{ $gasto->descripcion }}
                                            </td>
                                            <th>
                                                {{ $gasto->monto }}
                                            </th>
                                            <td class="text-capitalize">
                                                {{ $gasto->tipo }}
                                            </td>
                                        </tr>
                                @endforeach

                            </table>
                            {{ $ingresos->links() }}

                        </div>
                    </div>






                    <div>
                        <h3>Saldo Disponible = {{ $ingreso->monto - $gasto->monto }} </h3>
                    </div>

                    <div>
                        <canvas id="myChart"></canvas>
                    </div>




                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            new Chart(
                document.getElementById('myChart'), {
                    type: 'line',
                    data: {
                        datasets: [{
                            label: 'Monto gastado por Categoria',

                            data: {

                                @foreach ($grafica as $datos)


                                    {{ $datos->categoria }}: {{ $datos->monto }},
                                @endforeach
                            },
                        }]
                    }
                }
            );
        </script>



</x-app-layout>
