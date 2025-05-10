<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Entrada') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('entradas.update', $entrada->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                        <input type="text" name="tipo" id="tipo" value="{{ old('tipo', $entrada->tipo) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
                        <input type="number" name="monto" id="monto" value="{{ old('monto', $entrada->monto) }}" step="0.01" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $entrada->fecha) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="factura" class="block text-sm font-medium text-gray-700">Factura</label>
                        <input type="text" name="factura" id="factura" value="{{ old('factura', $entrada->factura) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('entradas.index') }}" class="mr-4 text-gray-600 hover:underline">Cancelar</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
