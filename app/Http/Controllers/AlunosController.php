<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunosController extends Controller
{
    protected $alunos;

    /**
     * @param \App\Alunos
     */
    public function __construct(Aluno $alunos)
    {
      $this->middleware('auth');
      $this->alunos = $alunos;
    }

    public function index()
    {
      return view('alunos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->alunos->rules);
      $data = $request->all();
      $data["birth"] = date("Y-m-d", strtotime($request->input('birth')));

      $inserted = $this->alunos->create($dates);
      if($inserted){
        return redirect()->route('alunos.index');
      }
      
      return abort(404, 'Erro ao inserir no banco de dados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $aluno = $this->alunos->find($id);
      return view('alunos.create', ['aluno' => $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $aluno = $this->alunos->find($id);
      return view('alunos.create', ['aluno' => $aluno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->alunos->rules);
      $aluno = $this->alunos->find($id);
      $updated = $aluno->updated($request->all());

      if($updated) {
        return redirect()->route('alunos.index');
      }
      return redirect()->route('alunos.edit', $id);
    }

    public function adjustPaid()
    {
      $alunos = $this->alunos->all();
      foreach ($alunos as $aluno){
        $aluno->update(['paid' => 0]);
      }
      return redirect()->route('alunos.index');
    }

    /**
     * Set payment true to user
     * 
     * @param $id
     */
    public function paid($id)
    {
      $aluno = $this->alunos->find($id);
      $aluno->update(['paid' => 1]);

      return redirect()->back();
    }

    public function destroy($id)
    {
      $aluno = $this->alunos->find($id);
      $deleted = $aluno->delete();
      
      if($deleted){
        return redirect()->route('alunos.index');
      }
      return redirect()->route('alunos.show', $id);
    }

    public function showAll()
    {
      $result = $this->alunos->orderBy('name')->get();
      return view('alunos.showAll', ['result' => $result]);
    }

    public function showPeriod($period)
    {
      if($period != 'manha' && $period != 'tarde'){
        abort(404, 'Pagina nao encontrada');
      }
      $titleHeader = "Alunos do período: ". ucwords($id);
      $alunos = $this->alunos->where('period', '=', $id)->orderBy('name')->get();

      return view('alunos.showAll', ['result' => $alunos,'titleH' => $titleHeader]);
    }

    public function search()
    {
      return view('alunos.search');
    }

    public function searchParam(Request $request)
    {
      $this->validate($request, ['method' => 'required', 'param' => 'required']);

      $dataForm = $request->only('method', 'param');
      $titleHeader = "Resultados da busca por: " . ucwords($dataForm['method']);

      if($dataForm['method'] == 'name'){
        $result = $this->alunos->where('name', 'like', '%'. $dataForm['param'] . '%')->orderBy('name')->get();
      } else {
        $result = $this->alunos->where($dataForm['method'], '=', $dataForm['param'])->orderBy('name')->get();
      }
      return view('alunos.showAll', ['result' => $result,'titleH' => $titleHeader]);
    }


}
