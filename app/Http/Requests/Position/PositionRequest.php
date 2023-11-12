<?php

namespace App\Http\Requests\Position;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class PositionRequest extends FormRequest
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
        $position=Rule::unique('stanowisko')->where('stanowisko',request()?->post('stanowisko',''))
            ->where('poziom_dostepu',request()?->post('poziom_dostepu',''));
        if(request()?->post('id',0)>0){
            $position=$position->ignore(request()?->post('id',0), 'id') ;
        }
        return [
            'stanowisko'=>'required|'.$position,
            'poziom_dostepu'=>'required|in:'.UserRole::BOSS.','.UserRole::MNGR.','.UserRole::WRKR
        ];
    }

    public function messages()
    {
       return[
           'stanowisko.required'=>'Proszę podać stanowisko',
           'stanowisko.unique'=>'Stanowisko isnieje już w systemie',
           'poziom_dostepu.required'=>'Proszę podać uprawnienie użytkownika',
           'poziom_dostepu.in'=>'Nieprawidłowa wartość uprawnienia',
       ];
    }
}
