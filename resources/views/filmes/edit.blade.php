@extends('layout_admin')
@section('title', 'Alterar Filme')
@section('content')

    <form method="POST" action="{{ route('admin.filmes.update', ['filme' => $filme]) }}" class="form-group">
        @csrf
        @method('PUT')
        @include('filmes.partials.create-edit')
        @isset($filme->cartaz_url)
            <div class="poster">
                <img src="{{ $filme->cartaz_url ? asset('storage/cartazes/' . $filme->cartaz_url) : '' }}" alt="Cartaz Filme"
                    class="img-profile" style="max-width:100%">
            </div>
        @endisset
        <div class="form-group text-right">
            @isset($filme->cartaz_url)
                @can('update', $filme)
                    <button type="submit" class="btn btn-danger" name="deletefoto" form="form_delete_photo">Apagar Foto</button>
                @endcan
            @endisset
            @can('update', $filme)
                <button type="submit" class="btn btn-success" name="ok">Alterar</button>
            @endcan
            <a href="{{ route('admin.filmes') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    <form id="form_delete_photo" action="{{ route('admin.filmes.foto.destroy', ['filme' => $filme]) }}"
        onsubmit="return confirm('Tem a certeza que deseja apagar o cartaz?')" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection
