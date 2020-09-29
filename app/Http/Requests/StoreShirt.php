<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShirt extends FormRequest
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
        'name' => 'required|unique:shirts,name,'.$this->shirt.'|max:128',
        'price' => 'required|max:1000',
        
        'slug' => 'nullable|unique:shirts,slug,'.$this->shirt.'|max:128',
        'description' => 'required|unique:shirts|max:20044',
        'img' => 'required|mimes:jpeg,bmp,png,gif',
         'img1' => 'nullable|mimes:jpeg,bmp,png,gif',
         'img2' => 'nullable|mimes:jpeg,bmp,png,gif',
        ];
    }
}
