<?php

namespace App\Http\Requests\WorkingTime;

use App\Rules\WorkingTime\InMonth;
use Illuminate\Foundation\Http\FormRequest;

class WorkingTimeSelectRequest extends FormRequest
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
            'miesiac'=>new InMonth(),
            'rok'=>'in:0,2018,2019,2020,2021,2022,2023'
        ];
    }

    public function messages()
    {
        return [
            'rok.in'=>'Proszę wybrać rok z dostępnej listy.',
        ];
    }
}
