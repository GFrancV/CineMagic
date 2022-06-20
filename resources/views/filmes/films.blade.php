<div class="row posters">
    @foreach ($filmes as $filme)
        <div class="col-sm-3 film" style="margin-bottom: 50px">
            <img src="{{ $filme->cartaz_url ? asset('storage/cartazes/' . $filme->cartaz_url) : asset('img/default_cartaz.jpg') }}"
                alt="poster">
            <h3>
                {{ $filme->titulo }}
            </h3>
            <a class="btn btn-primary" href="{{ '/filmes/' . $filme->id }}" role="button">Saber Mais</a>
        </div>
    @endforeach
</div>
