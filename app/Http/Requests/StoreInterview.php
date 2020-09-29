<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterview extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:interviews,name,'.$this->interview.'|max:128',
        'slug' => 'nullable|unique:interviews,slug,'.$this->interview.'|max:128',
        'description' => 'required|max:25044',
        'img' => 'nullable|mimes:jpeg,bmp,png,gif',
        ];
    }
}
