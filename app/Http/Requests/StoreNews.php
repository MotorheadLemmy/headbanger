<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
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
        'name' => 'required|unique:news,name,'.$this->news.'|max:128',
        'slug' => 'nullable|unique:news,slug,'.$this->news.'|max:128',
        'description' => 'required|max:6400',
        'img' => 'nullable|mimes:jpeg,bmp,png,gif',

        ];
    }
}
