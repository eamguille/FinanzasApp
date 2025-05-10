<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Salidas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('salidas.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                + Nueva Salida
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($salidas->isEmpty())
                    <p class="text-gray-600">No hay salidas registradas.</p>
                @else
                    <table class="min-w-full table-auto border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Tipo</th>
                                <th class="px-4 py-2 border">Monto</th>
                                <th class="px-4 py-2 border">Fecha</th>
                                <th class="px-4 py-2 border">Factura</th>
                                <th class="px-4 py-2 border">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salidas as $salida)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $salida->tipo }}</td>
                                    <td class="border px-4 py-2">${{ number_format($salida->monto, 2) }}</td>
                                    <td class="border px-4 py-2">{{ $salida->fecha }}</td>
                                    <td class="border px-4 py-2">{{ $salida->factura }}</td>
                                    <td class="border px-4 py-2">
                                    <a href="{{ route('salidas.edit', $salida->id) }}" class="text-blue-500 hover:underline">Editar</a>
                                    <span class="mx-6">|</span>
                                    <form action="{{ route('salidas.destroy', $salida->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta salida?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
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