<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TimeCompare implements Rule
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
        return strtotime($value)>time();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '预约时间不能是过去的时间';
    }
}
