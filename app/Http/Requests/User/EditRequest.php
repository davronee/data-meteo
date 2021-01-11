<?php

namespace App\Http\Requests\User;

use App\Rules\User\EmptyRolesRule;
use App\Rules\User\Create\RegionRule;
use App\Rules\User\Create\DistrictRule;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user();
        return $user->can('create users') || $user->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $input_array = $this->all();
        return [
            'region_id' => [new RegionRule($input_array)],
            'district_id' => [new DistrictRule($input_array)],
            'position_code' => 'required',
            'email' => 'required|email:rfc|unique:users,email',
            'password' => 'required|confirmed|string|min:6',
            'roles' => ['required'],
            'permissions' => ['sometimes'],
            'station_id' => 'nullable'
        ];
    }
}
