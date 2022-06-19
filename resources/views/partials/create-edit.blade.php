<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" name="nome" id="inputNome" value="" />
    <div class="small text-danger"> Mensagem de erro - Exemplo. </div>
</div>

<div class="form-group">
    <form method="GET" action="{{ route('admin.filmes') }}" class="form-group">
            <div class="input-group">
                <select class="custom-select" name="genero" id="genero" aria-label="Genero">
                    <option value="" {{ '' == old('genero') ? 'selected' : '' }}>Todos Géneros</option>
                        @foreach ($generos as $code => $nome)
                            <option value={{ $nome }}
                                {{ $nome == app('request')->input('genero') ? 'selected' : '' }}>
                                {{ $nome }}
                            </option>
                        @endforeach
                </select>
            </div>
        </form>
    <div class="small text-danger"> Mensagem de erro - Exemplo. </div>
</div>

<div class="form-group">
    <label for="inputSumario">Sinopse</label>
    <textarea rows="4" cols="50" name="comment" > Coloque a sinopse do filme </textarea>
    <div class="small text-danger"> Mensagem de erro - Exemplo. </div>
</div>