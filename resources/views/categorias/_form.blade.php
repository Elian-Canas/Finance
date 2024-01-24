@csrf

<label for="" class="uppercase text-gray-700 text-xs">Nombre</label>
<input type="text" name="name" value="{{ $categoria->name }}" class="rounded border-gray-200 w-full mb-4">

<div class="flex justify-between items-center">
    <a href="{{ route('categorias.index') }}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
