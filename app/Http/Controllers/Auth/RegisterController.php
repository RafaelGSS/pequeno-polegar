<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
      $this->user = $user;
      $this->middleware('auth');
    }

    public function showRegistrationForm()
    {
      return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $this->validate($request, $this->user->rules);
        $insert = $this->user->create([
            'name' => $data['name'],
            'password' => bcrypt($data['password'])
            ]);

        if($insert)
          return redirect('/home');
        else {
          return abort(404, 'Erro ao inserir no banco de dados');
        }
    }

}
