<?php

namespace App\Http\Requests\Category;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'slug'=>Str::slug($this->title),
            //'slug'=>Str::of($this->title)->slug()->append('-prueba'),
            //'slug'=>str($this->title)->slug()
    ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        if ($this->expectsJson()){
            $response = new Response($validator->errors(),400);
            throw new ValidationException($validator,$response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "title" => "required|min:5|max:500",
            "slug" => "required|min:5|max:500|unique:categories,slug,".$this->route('category')->id
        ];
    }
}
