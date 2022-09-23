@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" required name="name"
        @isset($enemy) value="{{ $enemy->name }}" @endisset placeholder="Ingrese el nombre">
</div>
<div class="form-group">
    <label for="hp">HP</label>
    <input type="number" class="form-control" required name="hp"
        @isset($enemy) value="{{ $enemy->hp }}" @endisset
        placeholder="Ingrese los puntos de vida">
</div>
<div class="form-group">
    <label for="atq">Ataque</label>
    <input type="number" class="form-control" required name="atq"
        @isset($enemy) value="{{ $enemy->atq }}" @endisset
        placeholder="Ingrese los puntos de ataque">
</div>
<div class="form-group">
    <label for="def">Defensa</label>
    <input type="number" class="form-control" required name="def"
        @isset($enemy) value="{{ $enemy->def }}" @endisset
        placeholder="Ingrese los puntos de Defensa">
</div>
<div class="form-group">
    <label for="coins">Monedas</label>
    <input type="number" class="form-control" required name="coins"
        @isset($enemy) value="{{ $enemy->coins }}" @endisset
        placeholder="Ingrese los puntos de Monedas">
</div>
<div class="form-group">
    <label for="xp">Experiencia</label>
    <input type="number" class="form-control" required name="xp"
        @isset($enemy) value="{{ $enemy->xp }}" @endisset
        placeholder="Ingrese la cantidad de Experiencia">
</div>
