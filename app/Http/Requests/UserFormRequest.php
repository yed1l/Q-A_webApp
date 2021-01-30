<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => $this->validateName(),
            'nick' => $this->validateNick(),
            'age' => $this->validateAge(),
            'email' => $this->validateEmail(),
            'password' => $this->validatePassword()
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messagesName = $this->messagesName();
        $messagesNick = $this->messagesNick();
        $messagesAge = $this->messagesAge();
        $messagesEmail = $this->messagesEmail();
        $messages = array_merge(
            $messagesName,
            $messagesNick,
            $messagesAge,
            $messagesEmail
        );
        return $messages;
    }


    /**
     * @return string
     */
    protected function validateName(){
        return 'required|string|min:4|max:100';
    }

    /**
     * @return string
     */
    protected function validateNick(){
        return 'required|string|min:4|max:100';
    }

    /**
     * @return string
     */
    protected function validateAge(){
        return 'required|integer|min:1|max:2';
    }

    /**
     * @return string
     */
    protected function validateEmail(){
        return 'required|email|unique';
    }

    /**
     * @return string
     */
    protected function validatePassword(){
        return 'required|min:6|confirmed';
    }


    /**
     * @return array
     */
    protected function messagesName()
    {
        $messages = array();
        $messages['name.required'] = 'Por favor, escribe un nombre válido';
        $messages['name.max'] = 'El número máximo de caracteres es 100';
        $messages['name.min'] = 'El número mínimo de caracteres es 4';
        $messages['name.string'] = 'El formato no es válido';

        return $messages;
    }

    /**
     * @return array
     */
    protected function messagesNick()
    {
        $messages = array();
        $messages['nick.required'] = 'Por favor, escribe un nick válido';
        $messages['nick.max'] = 'El número máximo de caracteres es 100';
        $messages['nick.min'] = 'El número mínimo de caracteres es 4';
        $messages['nick.string'] = 'El formato no es válido';

        return $messages;
    }

    /**
     * @return array
     */
    protected function messagesAge(){
        $messages = array();
        $messages['age.required'] = 'Escribe tu edad entre 0 y 99';
        $messages['age.integer'] = 'La edad solo pueden ser números';
        $messages['age.min'] = 'El número mínimo de caracteres es 1';
        $messages['age.max'] = 'El número máximo de caracteres es 2';

        return $messages;
    }

    /**
     * @return array
     */
    protected function messagesEmail(){
        $messages = array();
        $messages['email.required'] = 'Por favor, escribe tu email';
        $messages['email.email'] = 'El formato de email no es correcto.';
        $messages['email.unique'] = 'El email introducido ya está en uso.';

        return $messages;
    }

    /**
     * @return array
     */
    protected function messagesPassword(){
        $messages = array();
        $messages['password.required'] = 'La contraseña es requerida';
        $messages['password.min'] = 'El mínimo de caracteres para la contraseña es 6';
        $messages['password.confirmed'] = 'Por favor, confirma la contraseña';

        return $messages;
    }

}
