<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //



    public function show(){

    }


    public function index()
    {

        $users = User::where('empresa_id','=',Auth::user()->empresa_id)
                       ->where('grupo_id','=',2)->get();

        return view('usuarios.index', compact('users'));
    }
    public function clienteindex()
    {


        $users = User::where('empresa_id','=',Auth::user()->empresa_id)
                       ->where('grupo_id','=',1)->get();

        return view('clientes.index', compact('users'));
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
            $usuario->empresa     =  Auth::user()->empresa_id;
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

        $user = User::where('id','=',$id)
                ->where('empresa_id','=',Auth::user()->empresa_id)->get();

        return view('usuarios.edit', compact('user'));
    }




    public function update(UserRequest $request, User $user)
    {


        try {
            //code...

            $user->name        =   $request->name;
            $user->email       =   $request->email;
            $user->password    =   Hash::make($request->password);

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
            return redirect()->back()->withErrors([
                'message' =>[
                    $Error->getMessage()
                ],
            ]);
        }
    }

     public function clientecreate()
    {
        $users = User::all();

        return view('clientes.create', compact('users'));
    }

    public function clientesstore(UserRequest $request){

        try {
            //code...
            $usuario = new User;
            $usuario->name        =   $request->name;
            $usuario->email       =   $request->email;
            $usuario->password    =   Hash::make($request->password);
            $usuario->grupo_id    =   1;
            $usuario->empresa     =  Auth::user()->empresa_id;
            $usuario->save();
            return redirect()->route('clientes.index')->withSuccess('Cliente cadastrado com sucesso!');

        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withInput($request->all())->withErrors([
                'message' => [
                    $Error->getMessage()
                ],
            ]);
        }
    }

    public function clienteedit($id)
    {

        $user = User::where('id','=',$id)
                ->where('empresa_id','=',Auth::user()->empresa_id)->get();

        return view('clientes.edit', compact('user'));
    }




    public function clienteupdate(UserRequest $request, User $user)
    {


        try {
            //code...

            $user->name        =   $request->name;
            $user->email       =   $request->email;
            $user->password    =   Hash::make($request->password);

            $user->save();
            return redirect()->route('cliente.index')->withSuccess('Cliente alterado com sucesso!');

        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withInput($request->all())->withErrors([
                'message' => [
                    $Error->getMessage()
                ],
            ]);
        }
    }

    public function clientedestroy(User $user){
        try {

            $user->delete();
            return redirect()->route('cliente.index')->withSuccess('Cliente deletado com sucesso!');
        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withErrors([
                'message' =>[
                    $Error->getMessage()
                ],
            ]);
        }
    }

}
