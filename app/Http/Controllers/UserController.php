<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //



    public function show(){

    }


    public function index()
    {
        $users = User::all();

        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();

        return view('usuarios.create', compact('users'));
    }

    public function store(UserRequest $request){

        try {
            //code...
            $usuario = new User;
            $usuario->name        =   $request->name;
            $usuario->email       =   $request->email;
            $usuario->password    =   Hash::make($request->password);
            $usuario->grupo_id    =   1;
            $usuario->save();
            return redirect()->route('usuario.index')->withSuccess('Usuário cadastrado com sucesso!');

        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withInput($request->all())->withErrors([
                'message' => [
                    $Error->getMessage()
                ],
            ]);
        }
    }

    public function edit($id)
    {

        $user = User::find($id);

        return view('usuarios.edit', compact('user'));
    }




    public function update(UserRequest $request, User $user)
    {


        try {
            //code...

            $user->name        =   $request->name;
            $user->email       =   $request->email;
            $user->password    =   Hash::make($request->password);
            $user->grupo_id    =   1;
            $user->save();
            return redirect()->route('usuario.index')->withSuccess('Usuário alterado com sucesso!');

        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withInput($request->all())->withErrors([
                'message' => [
                    $Error->getMessage()
                ],
            ]);
        }
    }

    public function destroy(User $user){
        try {
            
            $user->delete();
            return redirect()->route('usuario.index')->withSuccess('Usuario deletado com sucesso!');
        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withInput($requestt->all())->withErrors([
                'message' =>[
                    $Error->getMessage()
                ],
            ]);
        }
    }

}
