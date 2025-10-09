<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $userId = $this->route('user');

        return [
            'text_username' => 'required|email|unique:users,username,'.($userId ? $userId : null),
            'text_password' => 'required|min:6|max:12',
        ];
    }

    public function messages(): array{
        return[
            //Mensagem para text_username
            'text_username.required' => 'O campo de e-mail é obrigatório',
            'text_username.email' => 'O campo de e-mail deve conter um endereço válido',
            'text_username.unique' => 'Este e-mail já está em uso.',

            //Mensagem para text_password
            'text_password.required' => 'A senha é obrigatória',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres',

        ];
    }
}
