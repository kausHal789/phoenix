<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AudioFileFormat implements Rule
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
        $audioType = ['mp3', 'm4a', 'wav'];
        return in_array($value->getClientOriginalExtension(), $audioType);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The audio file must be mp3, m4a, wav.';
    }
}
