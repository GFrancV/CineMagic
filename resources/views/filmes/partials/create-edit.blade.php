<div class="form-group">
    <label for="inputNome">Titulo</label>
    <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $filme->titulo) }}" required />
</div>
@error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="inputTrailer">Trailer URL</label>
    <input type="text" class="form-control" name="trailer_url" value="{{ old('trailer_url', $filme->trailer_url) }}"
        required />
</div>
@error('trailer_url')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="row">
    <div class="col-sm-8">
        <label for="genero">Genero</label>
        <select class="form-control" name="genero_code" required>
            <option value="">-- Todos Géneros
                --</option>
            @foreach ($generos as $genero)
                <option value={{ $genero->code }}
                    {{ old('genero_code', $filme->genero_code) == $genero->code ? 'selected' : '' }}>
                    {{ $genero->code }}
                </option>
            @endforeach
        </select>
        @error('genero_code')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-sm-4">
        <label for="inputNome">Ano</label>
        <input type="number" class="form-control" name="ano" value="{{ old('ano', $filme->ano) }}" required />
        @error('ano')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>

<div class="form-group">
    <label for="inputSumario">Sinopse</label>
    <textarea class="form-control" rows="4" cols="50" name="sumario" required> {{ old('sumario', $filme->sumario) }}</textarea>
</div>
@error('sumario')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="cartaz_url">Upload a cartaz</label>
    <input type="file" class="form-control-file" name="cartaz_url" id="cartaz_url">
    @error('cartaz_url')
        <div class="small text-danger">{{ $message }}</div>
    @enderror
</div>
