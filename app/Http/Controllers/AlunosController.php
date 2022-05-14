<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AlunosController extends Controller
{
    public $tipo_sexo = ['Masculino', 'Feminino'];
    public $tipo_esporte = ['Futebol', 'Karatê', 'Jiu-jitsu', 'Basquete', 'Handebol'];
    public $tipo_musica = ['Musicalização Infantil', 'Flauta', 'Violão', 'Coral'];
    public $tipo_danca = ['Ballet', 'Capoeira'];

    public function index(Request $request)
    {
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $alunos = Aluno::where('nome', 'like', "%" . $pesquisa . "%")
                ->orWhere('escola', 'like', "%" . $pesquisa . "%")
                ->paginate(2);
        } else {
            $alunos = Aluno::paginate(2);
        }

        return view('alunos.index', compact('alunos', 'pesquisa'));
    }

    public function novo()
    {
        $tipo_sexo = $this->tipo_sexo;
        $tipo_esporte = $this->tipo_esporte;
        $tipo_musica = $this->tipo_musica;
        $tipo_danca = $this->tipo_danca;

        return view('alunos.form', compact('tipo_sexo', 'tipo_esporte', 'tipo_musica', 'tipo_danca'));
    }

    public function salvar(Request $request)
    {
        if($request->id != '') {
            $aluno = Aluno::find($request->id);
            $aluno->update($request->all());
        } else {
            $aluno = Aluno::create($request->all());
        }
        
        $validator = Validator::make($request->all(), [    
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/alunos/editar/' . $aluno->id);
    }

    public function editar($id) {
        
        $tipo_sexo = $this->tipo_sexo;
        $tipo_esporte = $this->tipo_esporte;
        $tipo_musica = $this->tipo_musica;
        $tipo_danca = $this->tipo_danca;

        $aluno = Aluno::find($id);
        return view('alunos.form', compact('aluno', 'tipo_sexo', 'tipo_esporte', 'tipo_musica', 'tipo_danca'));
    }

    public function deletar($id)
    {
        $aluno = Aluno::find($id);
        if (!empty($aluno)) {
            $aluno->delete();
            return redirect('/alunos');
        } else {
            return redirect('/alunos');
        }
    }
}
