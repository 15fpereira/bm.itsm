<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class PerfilController extends Controller
{
    /**
     *
     *
     */
    public function index()
    {

    }

    /**
     *
     *
     */
    public function create()
    {

    }
    /**
     *
     *
     */
    public function store(Request $request)
    {

    }
    /**
     *
     *
     */
    public function show(Request $request, User $user, $perfil)
    {
        //função show com parametro da classe User passado para a view
        return view('auth.perfil.show', ['request'=> $request, 'user'=> $user, 'perfil' => $perfil]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // isset - Retorna true se var existe; false caso contrário.
        if(isset($request->name))
        {
            echo "Essa variável existe.";
           // dd($request->name

            $user->name = $request->name;
            $user->save();
            return redirect()->route('perfil.show',$user->id);

        }
        elseif(isset($request->email))
        {
            echo "Essa variável email existe.";
            //dd($request->email);
            $user->email = $request->email;
            $user->save();
            return redirect()->route('perfil.show',$user->id);
        }


        dd($request->name);
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        //dd($request->all());
        // Aqui estamos tentando redefinir a senha do usuário.
        // Se for bem sucedido nós atualizaremos a senha em um modelo de usuário real e a manteremos no banco de dados.
        // Caso contrário, analisaremos o erro e retornaremos a resposta.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),

                ])->save();

                event(new PasswordReset($user));
            }
        );
        dd($status);
        // Se a senha foi redefinida com sucesso, redirecionaremos o usuário de volta para a visualização
        // inicial autenticada do aplicativo. Se houver um erro, podemos redirecioná-los de volta para
        // onde vieram com sua mensagem de erro.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    /**
     *
     *
     */
    public function destroy()
    {

    }
}
