<div class="container mx-auto py-10 flex flex-col md:flex-row gap-6">
    <!-- Sidebar de filtros -->
    <aside class="w-full md:w-1/4 bg-white rounded-lg shadow p-4 mb-6 md:mb-0">
        <h2 class="text-lg font-bold mb-4">Filtrar</h2>
        <!-- Aquí van los filtros (tipo, precio, agave, región, etc.) -->
        <!-- Puedes usar checkboxes, selects, sliders, etc. -->
        <!-- Ejemplo de filtro simple -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tipo de Mezcal</label>
            <select class="w-full border rounded p-2">
                <option>Todos</option>
                <option>Joven</option>
                <option>Reposado</option>
                <option>Añejo</option>
            </select>
        </div>
        <!-- Agrega más filtros aquí -->
    </aside>

    <!-- Listado de mezcales -->
    <section class="w-full md:w-3/4">
        <h1 class="text-2xl font-bold mb-6">MEZCALES DESTACADOS</h1>
        <div class="grid grid-cols-1 gap-6">
            <!-- Ejemplo de producto -->
            @foreach($mezcales as $mezcal)
                <div class="flex items-center bg-white rounded-lg shadow p-4 gap-4">
                    <img src="{{ $mezcal->imagen_url }}" alt="{{ $mezcal->nombre }}" class="w-20 h-32 object-cover rounded" />
                    <div class="flex-1">
                        <h3 class="text-lg font-bold">{{ $mezcal->nombre }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $mezcal->descripcion }}</p>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xl font-bold text-green-700">${{ number_format($mezcal->precio, 2) }}</span>
                            @if($mezcal->precio_original)
                                <span class="text-sm line-through text-gray-400">${{ number_format($mezcal->precio_original, 2) }}</span>
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">¡En oferta!</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-500 font-bold">{{ $mezcal->calificacion }}</span>
                            <span class="text-xs text-gray-500">({{ $mezcal->num_opiniones }} opiniones)</span>
                        </div>
                    </div>
                    <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded shadow transition">Visualizar</a>
                </div>
            @endforeach
        </div>
    </section>
</div>
