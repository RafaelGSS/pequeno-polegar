<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunosController extends Controller
{
    protected $alunos;

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
      $dates = $request->all();
      $dates["birth"] = date("Y-m-d", strtotime($request->input('birth')));
      $this->validate($request, $this->alunos->rules);
      $insert = $this->alunos->create($dates);
      if($insert){
        return redirect()->route('alunos.index');
      }else {
        return abort(404, 'Erro ao inserir no banco de dados');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $true = true;
      $aluno = $this->alunos->find($id);
      return view('alunos.create',compact('aluno','true'));
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
      return view('alunos.create', compact('aluno'));
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
      $dateForm = $request->all();

      $aluno = $this->alunos->find($id);
      $this->validate($request, $this->alunos->rules);

      $update = $aluno->update($dateForm);

      if($update)
        return redirect()->route('alunos.index');
      else {
        return redirect()->route('alunos.edit', $id);
      }
    }
    // In tests
    public function adjustPaid()
    {
      $als = $this->alunos->all();
      foreach ($als as $aluno){
        $aluno["paid"] = 0;
        $data = $aluno->toArray();
        $aluno->update($data);
      }

      return redirect()->route('alunos.index');
    }

    public function paid($id)
    {
      $aluno = $this->alunos->find($id);
      $aluno["paid"] = 1;
      $data = $aluno->toArray();

      $paid = $aluno->update($data);

      if($paid)
        return redirect()->back();
      else {
        abort(404, "Erro inesperado!");
      }
    }

    public function destroy($id)
    {
        $aluno = $this->alunos->find($id);
        $del = $aluno->delete();

        if($del){
          return redirect()->route('alunos.index');
        }else{
          return redirect()->route('alunos.show', $id);
        }
    }

    public function showAll()
    {
      $result = $this->alunos->orderBy('name')->get();
      return view('alunos.showAll', compact('result'));
    }
    public function showPeriod($id)
    {
      if($id != 'manha' && $id != 'tarde'){
        abort(404, 'Pagina nao encontrada');
      }
      $titleH = "Alunos do período: ". ucwords($id);
      $result = $this->alunos->where('period', '=', $id)->orderBy('name')->get();
      return view('alunos.showAll', compact('result','titleH'));
    }

    public function search()
    {
      return view('alunos.search');
    }

    public function searchParam(Request $request)
    {
      $this->validate($request, [
        'method' => 'required',
      ]);
      $dataForm = $request->only('method', 'param');
      $titleH = "Resultados da busca por: " . ucwords($dataForm['method']);
      if($dataForm['method'] == 'name'){
      $result = $this->alunos->where('name', 'like', '%'. $dataForm['param'] . '%')->orderBy('name')->get();
    } else {
      $result = $this->alunos->where($dataForm['method'], '=', $dataForm['param'])->orderBy('name')->get();
    }
      return view('alunos.showAll', compact('result','titleH'));
    }


}
