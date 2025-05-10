<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Mis Salidas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('salidas.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                + Nueva Salida
            </a>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($salidas->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">No hay salidas registradas.</p>
                @else
                <table class="min-w-full table-auto border border-gray-200 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr class="text-gray-700 dark:text-gray-300">
                            <th class="px-4 py-2 border dark:border-gray-600">Tipo</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Monto</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Fecha</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Factura</th>
                            <th class="px-4 py-2 border dark:border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-200">
                        @foreach ($salidas as $salida)
                        <tr class="text-center odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-700">
                            <td class="border px-4 py-2 dark:border-gray-600">{{ $salida->tipo }}</td>
                            <td class="border px-4 py-2 dark:border-gray-600">${{ number_format($salida->monto, 2) }}</td>
                            <td class="border px-4 py-2 dark:border-gray-600">{{ $salida->fecha }}</td>
                            <td class="border px-4 py-2 dark:border-gray-600">
                                @if ($salida->factura)
                                <a href="{{ asset('storage/' . $salida->factura) }}" target="_blank" class="text-blue-600 dark:text-blue-400 underline">Ver factura</a>
                                @endif
                            </td>
                            <td class="border px-4 py-2 dark:border-gray-600">
                                <a href="{{ route('salidas.edit', $salida->id) }}" class="text-blue-500 dark:text-blue-400 hover:underline">Editar</a>
                                <span class="mx-6 text-gray-500 dark:text-gray-400">|</span>
                                <form action="{{ route('salidas.destroy', $salida->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta salida?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 dark:text-red-400 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>