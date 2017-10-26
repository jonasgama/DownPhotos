<?php

namespace App\Http\Requests;



use Auth;
use App\User;
use Illuminate\Foundation\Http\FormRequest;


class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userObj = new \App\User;
        return [
            'nome' => 'required|string|min:'.$userObj::minNome.'|max:'.$userObj::maxNome,
            'sobrenome' => 'required|string|min:'.$userObj::minSobrenome.'|max:'.$userObj::maxSobrenome,
            'email' => 'required|string|email|max:'.$userObj::maxEmail.'|unique:users',
            'password' => 'required|confirmed|string|min:'.$userObj::minPassword.'|max:'.$userObj::maxPassword.'|confirmed',

        ];
    }

    public function persist(){

         $user = User::create([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'access_level_id' => 2,
            'cep' => null,
            'endereco' => null,
            'cidade' => null,
            'pais' => null,
            'telefone' => null
            ]);
        
        auth()->login($user);
    }

}
