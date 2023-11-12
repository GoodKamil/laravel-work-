<?php

namespace App\Rules\WorkingTime;

use Illuminate\Contracts\Validation\Rule;

class InMonth implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value >= 0 && $value <= 12;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Proszę wybrać miesiąć z dostępnej listy.';
    }
}
