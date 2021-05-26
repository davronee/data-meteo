<?php

namespace App\Http\Requests\QuickInfo;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
{
    public function authorize()
    {
        // TODO: allow only by permission
        return true;
    }

    public function rules()
    {
        return [
            'region_id' => 'sometimes|nullable',
            'info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'info.required' => trans('messages.info_required'),
            'region_id.required' => trans('messages.region_id_required')
        ];
    }
}
