@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" required name="name"
        @isset($hero)
            value="{{ $hero->name }}"
        @endisset
        placeholder="Ingrese el nombre">
</div>
<div class="form-group">
    <label for="hp">HP</label>
    <input type="number" class="form-control" required name="hp"
        @isset($hero)
            value="{{ $hero->hp }}"
        @endisset
        placeholder="Ingrese los puntos de vida">
</div>
<div class="form-group">
    <label for="atq">Ataque</label>
    <input type="number" class="form-control" required name="atq"
        @isset($hero)
            value="{{ $hero->atq }}"
        @endisset
        placeholder="Ingrese los puntos de ataque">
</div>
<div class="form-group">
    <label for="def">Defensa</label>
    <input type="number" class="form-control" required name="def"
        @isset($hero)
            value="{{ $hero->def }}"
        @endisset
        placeholder="Ingrese los puntos de Defensa">
</div>
<div class="form-group">
    <label for="luck">Suerte</label>
    <input type="number" class="form-control" required name="luck"
        @isset($hero)
            value="{{ $hero->luck }}"
        @endisset
        placeholder="Ingrese los puntos de Suerte">
</div>
<div class="form-group">
    <label for="coins">Monedas</label>
    <input type="number" class="form-control" required name="coins"
        @isset($hero)
            value="{{ $hero->coins }}"
        @endisset
        placeholder="Ingrese la cantidad de Monedas">
</div>

<div class="form-group">
    <label for="img_path">Imagen</label>
    <input type="file" class="form-control" name="img_path" id="img_path">
</div>
