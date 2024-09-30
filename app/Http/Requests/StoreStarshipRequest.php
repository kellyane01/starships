<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class StoreStarshipRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'manufacturer' => 'string|max:255',
            'cost' => 'nullable|numeric',
            'length' => 'nullable|numeric|min:0',
            'max_atmosphering_speed' => 'nullable|numeric|min:0',
            'crew' => 'nullable|string',
            'passengers' => 'nullable|string',
            'cargo_capacity' => 'nullable|numeric|min:0',
            'consumables' => 'nullable|string',
            'hyperdrive_rating' => 'nullable|numeric|between:0,10',
            'MGLT' => 'nullable|numeric|min:0',
            'starship_class' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo obrigatório.',
            'string' => "O campo deve ser texto.",
            'max' => "O campo deve ter no máximo 255 caracteres.",
            'min' => "O campo deve ter no mínimo 1 caracteres.",
            'numeric' => "O campo deve ser numerico.",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $message = "Existem campos que precisam ser corrigidos.";

        throw new HttpResponseException(response()->json([
            "success" => false,
            "message" => $message,
            "errors" => $errors
        ], Response::HTTP_INTERNAL_SERVER_ERROR));
    }
}
