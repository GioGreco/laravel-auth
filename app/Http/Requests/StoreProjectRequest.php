<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|max:150|min:3',
            'description' => 'nullable',
            'project_image' => 'nullable|image',
            'category_id' => 'nullable|exists:categories.id'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Ogni progetto ha bisogno di un titolo.',
            'title.min' => 'Il titolo deve essere lungo almeno :min caratteri.',
            'title.max' => 'Il titolo non può superare i :max caratteri.',
            'title.unique:projects' => 'Il titolo esiste già.'
        ];
    }
}
