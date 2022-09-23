@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" required name="name"
        @isset($item) value="{{ $item->name }}" @endisset placeholder="Ingrese el nombre">
</div>
<div class="form-group">
    <label for="hp">HP</label>
    <input type="number" class="form-control" required name="hp"
        @isset($item) value="{{ $item->hp }}" @endisset
        placeholder="Ingrese los puntos de vida">
</div>
<div class="form-group">
    <label for="atq">Ataque</label>
    <input type="number" class="form-control" required name="atq"
        @isset($item) value="{{ $item->atq }}" @endisset
        placeholder="Ingrese los puntos de ataque">
</div>
<div class="form-group">
    <label for="def">Defensa</label>
    <input type="number" class="form-control" required name="def"
        @isset($item) value="{{ $item->def }}" @endisset
        placeholder="Ingrese los puntos de Defensa">
</div>
<div class="form-group">
    <label for="luck">Suerte</label>
    <input type="number" class="form-control" required name="luck"
        @isset($item) value="{{ $item->luck }}" @endisset
        placeholder="Ingrese los puntos de Suerte">
</div>
<div class="form-group">
    <label for="cost">Precio</label>
    <input type="number" class="form-control" required name="cost"
        @isset($item) value="{{ $item->cost }}" @endisset
        placeholder="Ingrese la cantidad de Monedas">
</div>
