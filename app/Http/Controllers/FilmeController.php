<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Http\Request;
use App\Http\Requests\FilmePost;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function admin_index(Request $request)
    {
        $genero = $request->genero ?? '';
        $genero_code = Genero::all()->where('nome', $genero);

        $qry = Filme::query();
        if ($genero) {
            foreach ($genero_code as $code){
                $qry->where('genero_code', $code->code);
                break;
            }
        }
        $filmes = $qry->paginate(10);
        $generos = Genero::pluck('nome', 'code');

        return view('filmes.admin', compact('filmes', 'generos', 'genero'));
    }
    public function index(Request $request)
    {
        $generos = Genero::pluck('nome', 'abreviatura');
        $genero = $request->query('genero', 'EI');
        $ano = $request->ano ?? 1;
        $discSem1 = Filme::where('genero', $genero)
            ->where('ano', $ano)
            ->where('semestre', 1)
            ->get();
        $discSem2 = Filme::where('genero', $genero)
            ->where('ano', $ano)
            ->where('semestre', 2)
            ->get();
        return view(
            'filmes.index',
            compact('discSem1', 'discSem2', 'ano', 'genero', 'generos')
        );
    }
    public function edit(Filme $filme)
    {
        $generos = Genero::all();

        return view('filmes.edit', ['generos' => $generos, 'filme' => $filme]);

    }
    public function create()
    {
        $generos = Genero::all();
        $filme = new Filme();
        //return view('filmes.create', compact('filme', 'generos'));
        return view('filmes.create', ['generos' => $generos]);


    }
    public function store(FilmePost $request)
    {
        $validated_data = $request->validated();
        $newFilme = new Filme;
        $newFilme->titulo = $validated_data['titulo'];
        $newFilme->trailer_url = $validated_data['trailer_url'];
        $newFilme->genero_code = $validated_data['genero_code'];
        $newFilme->ano = $validated_data['ano'];
        $newFilme->sumario = $validated_data['sumario'];
        $newFilme->save();

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $newFilme->titulo . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(FilmePost $request, Filme $filme)
    {
        $validated_data = $request->validated();
        $filme->titulo = $validated_data['titulo'];
        $filme->trailer_url = $validated_data['trailer_url'];
        $filme->genero_code = $validated_data['genero_code'];
        $filme->ano = $validated_data['ano'];
        $filme->sumario = $validated_data['sumario'];
        $filme->save();

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Filme $filme)
    {
        $oldTitulo = $filme->titulo;
        $oldID = $filme->id;
        $oldUrlCartaz = $filme->cartaz_url;

        try {
            $filme->delete();
            Filme::destroy($oldID);
            Storage::delete('public/storage/cartazes/' . $oldUrlCartaz);
            return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi apagado com sucesso!')
            ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            // $th é a exceção lançada pelo sistema - por norma, erro ocorre no servidor BD MySQL
            // Descomentar a próxima linha para verificar qual a informação que a exceção tem
            //dd($th, $th->errorInfo);

            if ($th->errorInfo[1] == 1451) {   // 1451 - MySQL Error number for "Cannot delete or update a parent row: a foreign key constraint fails (%s)"
                return redirect()->route('admin.filmes')
                ->with('alert-msg', 'Não foi possível apagar o Filme "' . $oldTitulo . '", porque este filme já tem sessões!')
                ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.filmes')
                ->with('alert-msg', 'Não foi possível apagar o Filme "' . $oldTitulo . '". Erro: ' . $th->errorInfo[2])
                ->with('alert-type', 'danger');
            }
        }


    }
}
