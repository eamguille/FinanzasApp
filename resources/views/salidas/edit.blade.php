<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Salida') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('salidas.update', $salida->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo</label>
                        <input type="text" name="tipo" id="tipo" value="{{ old('tipo', $salida->tipo) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Monto</label>
                        <input type="number" name="monto" id="monto" value="{{ old('monto', $salida->monto) }}" step="0.01" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $salida->fecha) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    @if ($salida->factura)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-300">Factura actual:</p>
                        <img src="{{ asset('storage/' . $salida->factura) }}" alt="Factura actual" class="w-40 h-auto rounded border dark:border-gray-500">
                    </div>
                    @endif

                    <div class="mb-4">
                        <label for="factura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Factura (opcional)</label>
                        <input type="file" name="factura" id="factura" accept="image/*"
                            class="mt-1 block w-full text-gray-700 dark:text-gray-200 dark:bg-gray-700">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('salidas.index') }}"
                            class="mr-4 text-gray-600 dark:text-gray-300 hover:underline">Cancelar</a>
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>