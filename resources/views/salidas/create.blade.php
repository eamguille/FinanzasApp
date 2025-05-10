<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nueva Salida') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('salidas.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                        <input type="text" name="tipo" id="tipo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
                        <input type="number" name="monto" id="monto" step="0.01" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" name="fecha" id="fecha" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="factura" class="block text-sm font-medium text-gray-700">Factura (opcional)</label>
                        <input type="text" name="factura" id="factura" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('salidas.index') }}" class="mr-4 text-gray-600 hover:underline">Cancelar</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
