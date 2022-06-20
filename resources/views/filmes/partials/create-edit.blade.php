<div class="form-group">
    <label for="inputNome">Titulo</label>
    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required />
</div>
@error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="inputTrailer">Trailer URL</label>
    <input type="text" class="form-control" name="trailer_url" value="{{ old('trailer_url') }}" required />
</div>
@error('trailer_url')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="row">
    <div class="col-sm-8">
        <label for="genero">Genero</label>
        <select class="form-control" name="genero_code" required>
            <option value="" {{ '' == old('genero_code') ? 'selected' : '' }}>-- Todos Géneros --</option>
            @foreach ($generos as $code => $nome)
                <option value={{ $nome->code }} {{ old('genero_code') == $nome->code ? 'selected' : '' }}>
                    {{ $nome->code }}
                </option>
            @endforeach
        </select>
        @error('genero_code')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-sm-4">
        <label for="inputNome">Ano</label>
        <input type="number" class="form-control" name="ano" value="{{ old('ano') }}" required />
        @error('ano')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="form-group">
    <label for="inputSumario">Sinopse</label>
    <textarea class="form-control" rows="4" cols="50" name="sumario" required> {{ old('sumario') }}</textarea>
</div>
@error('sumario')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
