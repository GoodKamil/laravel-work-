<?php

namespace App\Http\Requests\WorkingTime;

use App\Rules\WorkingTime\InMonth;
use Illuminate\Foundation\Http\FormRequest;

class WorkingTimeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'pracownik'=>'numeric|exists:users,id',
            'miesiac'=>new InMonth(),
            'rok'=>'in:0,2018,2019,2020,2021,2022,2023'
        ];
    }

    public function messages()
    {
        return [
        'pracownik.required'=>'Proszę wybrać pracownika.',
        'pracownik.exists'=>'Proszę wybrać pracownika z dostępnej listy.',
        'rok.in'=>'Proszę wybrać rok z dostępnej listy.',
        ];
    }
}
