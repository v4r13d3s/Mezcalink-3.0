<div class="container mx-auto py-10 flex flex-col md:flex-row gap-6">
    <!-- Sidebar de filtros -->
    <aside class="w-full md:w-1/4 bg-white rounded-lg shadow p-4 mb-6 md:mb-0">
        <h2 class="text-lg font-bold mb-4">Filtrar</h2>
        <!-- Precio -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Precio</label>
            <div class="flex items-center gap-2">
                <input type="number" wire:model="precioMin" class="w-1/2 border rounded p-1" min="0"
                    placeholder="Mínimo">
                <span>-</span>
                <input type="number" wire:model="precioMax" class="w-1/2 border rounded p-1" min="0"
                    placeholder="Máximo">
            </div>
        </div>
        <!-- Tipo de mezcal -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tipo de Mezcal</label>
            @foreach (['Joven', 'Reposado', 'Añejo'] as $tipo)
                <div>
                    <input type="checkbox" wire:model="tipoMezcal" value="{{ $tipo }}"> {{ $tipo }}
                </div>
            @endforeach
        </div>
        <!-- Tipo de agave -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tipo de Agave</label>
            @foreach (['Espadín', 'Tobalá', 'Cuishe'] as $agave)
                <div>
                    <input type="checkbox" wire:model="tipoAgave" value="{{ $agave }}"> {{ $agave }}
                </div>
            @endforeach
        </div>
        <!-- Región de origen -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Región de Origen</label>
            @foreach (['Oaxaca', 'Guerrero', 'Durango'] as $region)
                <div>
                    <input type="checkbox" wire:model="region" value="{{ $region }}"> {{ $region }}
                </div>
            @endforeach
        </div>
        <!-- Categorías -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Categorías</label>
            @foreach (\App\Models\Category::all() as $cat)
                <div>
                    <input type="checkbox" wire:model="categoria" value="{{ $cat->id }}"> {{ $cat->nombre }}
                </div>
            @endforeach
        </div>
        <!-- Etiquetas de filtros seleccionados -->
        <div class="mt-6">
            <span class="font-bold">Filtrar por:</span>
            <div class="flex flex-wrap gap-2 mt-2">
                {{-- @foreach ($tipoMezcal as $filtro)
                    <span class="bg-orange-200 text-orange-800 px-2 py-1 rounded-full text-xs">{{ $filtro }}</span>
                @endforeach --}}
                @foreach ($tipoAgave as $filtro)
                    <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">{{ $filtro }}</span>
                @endforeach
                @foreach ($state as $filtro)
                    <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-xs">{{ $filtro }}</span>
                @endforeach
                {{-- @foreach ($categoria as $catId)
                    <span class="bg-purple-200 text-purple-800 px-2 py-1 rounded-full text-xs">
                        {{ \App\Models\Category::find($catId)->nombre ?? 'Categoría' }}
                    </span>
                @endforeach --}}
                @if ($precioMin > 0 || $precioMax < 2000)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">
                        ${{ $precioMin }} - ${{ $precioMax }}
                    </span>
                @endif
            </div>
        </div>
    </aside>


    <!-- Listado de mezcales -->
    <section class="w-full md:w-3/4">
        <h1 class="text-2xl font-bold mb-6 text-center underline decoration-orange-500 decoration-4 underline-offset-8">
            MEZCALES DESTACADOS</h1>
        <div class="grid grid-cols-1 gap-6">
            <!-- Ejemplo de producto -->
            @foreach ($mezcales as $mezcal)
                <div class="flex items-center bg-white rounded-lg shadow p-4 gap-4">
                    <img src="{{ $mezcal->url }}" alt="{{ $mezcal->nombre }}"
                        class="w-20 h-32 object-cover rounded" />
                    <div class="flex-1">
                        <h3 class="text-lg font-bold">{{ $mezcal->nombre }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $mezcal->descripcion }}</p>
                        <div class="flex items-center gap-2 mb-2">
                            <span
                                class="text-xl font-bold text-green-700">${{ number_format($mezcal->precio_regular, 2) }}</span>
                            @if ($mezcal->precio_regular)
                                <span
                                    class="text-sm line-through text-gray-400">${{ number_format($mezcal->precio_regular, 2) }}</span>
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">¡En oferta!</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-500 font-bold">{{ $mezcal->calificacion }}</span>
                            <span class="text-xs text-gray-500">({{ $mezcal->num_opiniones }} opiniones)</span>
                        </div>
                    </div>
                    <a href="#"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded shadow transition">Visualizar</a>
                </div>
            @endforeach
        </div>
    </section>
</div>
