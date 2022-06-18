@extends('layout_admin')

@section('title', 'Filmes')

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            @can('create', App\Models\Filme::class)
                <a href="{{ route('admin.filmes.create') }}" class="btn btn-success" role="button" aria-pressed="true">Nova
                    Filme</a>
            @endcan
        </div>
      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Género</th>
                <th>Cartaz</th>
                <th>Sumário</th>
                <th>Trailer</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->titulo }}</td>
                    <td>{{ $filme->genero_code }}</td>
                    <td>{{ $filme->cartaz_url }}</td>
                    <td>{{ $filme->sumario }}</td>
                    <td>{{ $filme->trailer_url }}</td>
                    <td nowrap>

                        @can('view', $filme)
                            <a href="{{ route('admin.filmes.edit', ['filme' => $filme]) }}" class="btn btn-primary btn-sm"
                                role="button" aria-pressed="true">
                                <i class="fas @cannot('update', $filme) fa-eye
                        @else
                        fa-pen @endcan"></i>
                            </a>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i
                                    class="fa @cannot('update', $filme) fa-eye
                        @else
                        fa-pen @endcan"></i></span>
                        @endcan
                        @can('delete', $filme)
                            <form action="{{ route('admin.filmes.destroy', ['filme' => $filme]) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Tem a certeza que deseja apagar o registo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-trash"></i></span>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $filmes->withQueryString()->links() }}
@endsection
