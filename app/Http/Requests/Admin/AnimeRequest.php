<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|max:200',
            'description'   => 'required',
            'type'          => 'required',
            'studio'        => 'required|max:200',
            'status'        => 'required',
            'quality'       => 'required',
            'rating'        => 'required',
            'duration'      => 'required|numeric',
            'total_episode' => 'required|numeric',
            'release_date'  => 'required',
            'genres'        => 'required'
        ];
    }
}
