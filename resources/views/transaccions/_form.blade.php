@csrf

<label for="" class="uppercase text-gray-700 text-xs">Categoria</label>
<select name="categoria_id" required class="rounded border-gray-200 w-full mb-4">
    <option selected>Seleccione la categoria</option>

    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">
            {{ $categoria->name }} </option>
    @endforeach
</select>

<label for="" class="uppercase text-gray-700 text-xs">Fecha</label>
<input required type="date" name="fecha" class="rounded border-gray-200 w-full mb-4" value="{{ $transaccion->fecha }}">

<label for="" class="uppercase text-gray-700 text-xs">Descripcion</label>
<input type="text" name="descripcion" value="{{ $transaccion->descripcion }}" required class="rounded border-gray-200 w-full mb-4" aria-placeholder="Descripcion..."
    >

<label for="" class="uppercase text-gray-700 text-xs">Valor</label>
<input type="number" name="monto" required class="rounded border-gray-200 w-full mb-4"value="{{ $transaccion->monto }}" placeholder="$$$">

<label for="" class="uppercase text-gray-700 text-xs">Tipo</label>
<select name="tipo" class="rounded border-gray-200 w-full mb-4" required>
    <option selected>Seleccione el tipo de dato</option>
    <option value="ingreso">Ingreso</option>
    <option value="gasto">Gasto</option>
</select>


<div class="flex justify-between items-center">
    <a href="{{ route('transaccions.index') }}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
