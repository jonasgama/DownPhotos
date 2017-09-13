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
        return [
            'nome' => 'required|string|min:2|max:255',
            'sobrenome' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:6|confirmed'
        ];
    }

    public function persist(){

         $user = User::create([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
            ]);
        
        auth()->login($user);
    }

}
