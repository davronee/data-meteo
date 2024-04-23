<?php

namespace App\Rules\User\Create;

use Illuminate\Contracts\Validation\Rule;

class DistrictRule implements Rule
{
    protected $input_array;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($input_array)
    {
        $this->input_array = $input_array;
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
        $is_valid = true;

        if(is_null($value))
        {
            switch ($this->input_array['position_code']) {
                case 'T1':
                case 'T2':
                case 'T3':
                    $is_valid = false;
                    break;
            }
        }

        return $is_valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('messages.district_id_required_message');
    }
}
