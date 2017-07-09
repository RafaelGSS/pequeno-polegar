<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\Aluno;
use DB;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    // var teste = json[0]; no blade {{ teste["count"] }}
    {
        //references  $JsonAlunos[0]->count
        $alunos = DB::table('alunos')->select(DB::raw('count(*) as count'))->get();
        // $funcionarios = DB:table('funcionarios')->select(DB::raw('count(*)'))->get();
        // $usuarios = DB::table('users')->select(DB::raw('count(*) as count'))->get();

        $alunosAtraso = DB::table('alunos')
                            ->select(DB::raw('count(*) as count'))
                            ->where('paid', '=', '0')
                            ->get();

        $alunosPeriodoM = DB::table('alunos')
                            ->select(DB::raw('count(*) as count'))
                            ->where('period', '=', 'manha')
                            ->get();

        $alunosPeriodoT = $alunos[0]->count - $alunosPeriodoM[0]->count;

        return view('home', compact('alunosAtraso','alunos','alunosPeriodoM', 'alunosPeriodoT'));
    }

    public function config()
    {
      return view('config');
    }
}
