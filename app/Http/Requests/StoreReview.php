<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReview extends FormRequest
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
        'band' => 'required|unique:reviews,band,'.$this->review.'|max:128',
        'album' => 'required|max:128',
        'rating' => 'required|max:128',
        'tracklist' => 'required|max:1232',
        'slug' => 'nullable|unique:reviews,slug,'.$this->review.'|max:128',
        'description' => 'required|max:20044',
        'img' => 'nullable|mimes:jpeg,bmp,png,gif',
        ];
    }
}
