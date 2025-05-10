<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Balance Financiero') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow rounded text-gray-800 dark:text-gray-100 p-6">
                <h3 class="text-lg font-bold mb-4">Resumen General</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Total Entradas -->
                    <div class="bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-500 p-4 rounded shadow">
                        <p class="text-sm font-medium text-blue-800 dark:text-blue-200">Total Entradas</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">${{ number_format($totalEntradas, 2) }}</p>
                    </div>

                    <!-- Total Salidas -->
                    <div class="bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-500 p-4 rounded shadow">
                        <p class="text-sm font-medium text-blue-800 dark:text-blue-200">Total Salidas</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">${{ number_format($totalSalidas, 2) }}</p>
                    </div>

                    <!-- Balance -->
                    <div class="bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-500 p-4 rounded shadow">
                        <p class="text-sm font-medium text-blue-800 dark:text-blue-200">Balance</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">${{ number_format($balance, 2) }}</p>
                    </div>
                </div>


                <div class="my-6 flex justify-center">
                    <div class="w-[400px] h-[400px]">
                        <canvas id="balanceChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <!-- Entradas -->
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Entradas</h4>
                        <table class="min-w-full table-auto border border-gray-300">
                            <thead>
                                <tr class="bg-blue-100">
                                    <th class="px-4 py-2 border">Tipo</th>
                                    <th class="px-4 py-2 border">Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entradas as $entrada)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $entrada->tipo }}</td>
                                    <td class="px-4 py-2 border">${{ number_format($entrada->monto, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Salidas -->
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Salidas</h4>
                        <table class="min-w-full table-auto border border-gray-300">
                            <thead>
                                <tr class="bg-red-100">
                                    <th class="px-4 py-2 border">Tipo</th>
                                    <th class="px-4 py-2 border">Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salidas as $salida)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $salida->tipo }}</td>
                                    <td class="px-4 py-2 border">${{ number_format($salida->monto, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const totalEntradas = @json($totalEntradas);
        const totalSalidas = @json($totalSalidas);

        const ctx = document.getElementById('balanceChart').getContext('2d');
        const balanceChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Entradas', 'Salidas'],
                datasets: [{
                    data: [totalEntradas, totalSalidas],
                    backgroundColor: ['#38bdf8', '#f87171']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
</x-app-layout>