<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageFileFormat implements Rule
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
        $imageType = ['png', 'jpeg', 'jpg'];
        return in_array($value->getClientOriginalExtension(), $imageType);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Image file must be jpeg, jpg, png.';

    }
}
