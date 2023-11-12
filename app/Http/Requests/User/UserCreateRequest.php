<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'stanowisko'=> ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Proszę podać imię pracownika',
            'surname.required'=>'Proszę podać nazwisko pracownika',
            'email.required'=>'Proszę podać adres email pracownika',
            'email.email'=>'Proszę podać prawidłowy adres email',
            'email.unique'=>'Podany adres email istnieje już w systemie',
            'password.required'=>'Proszę wpisać hasło',
            'password.confirmed'=>'Wpisane hasła nie pasują do siebie',
            'password.min'=>'Minimalna długość hasła to 8 znaków',
            'stanowisko.required'=>'Proszę uzupełnić stanowisko'
        ];
    }
}
