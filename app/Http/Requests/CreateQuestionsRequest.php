<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionsRequest extends FormRequest
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
            'title' => $this->validarTitulo(),
            'content' => $this->validarContenido(),
            'category' => $this->validarCategoria()
        ];
    }


    public function messages()
    {
        $mensajesTitulo = $this->mensajesTitulo();
        $mensajesCategoria = $this->mensajesCategoria();
        $mensajesContenido = $this->mensajesContenido();
        $mensajes = array_merge(
            $mensajesTitulo,
            $mensajesCategoria,
            $mensajesContenido
        );
        return $mensajes;
    }


    protected function validarTitulo(){
        return 'required|string|min:15|max:200';
    }

    protected function mensajesTitulo()
    {
        $mensajes = array();
        $mensajes['title.required'] = 'Por favor, escribe un título válido';
        $mensajes['title.max'] = 'El número máximo de caracteres es 200';
        $mensajes['title.min'] = 'El número mínimo de caracteres es 15';
        $mensajes['title.string'] = 'El formato no es válido';

        return $mensajes;
    }


    protected function validarCategoria(){
        return 'required';
    }

    protected function mensajesCategoria()
    {
        $mensajes = array();
        $mensajes['category.required'] = 'Por favor, selecciona una categoría válida';
        return $mensajes;
    }


    protected function validarContenido(){
        return 'required|min:15|string|max:1000';
    }

    protected function mensajesContenido()
    {
        $mensajes = array();
        $mensajes['content.required'] = 'El contenido es erróneo';
        $mensajes['content.max'] = 'El número máximo de caracteres es 1000';
        $mensajes['content.min'] = 'El número mínimo de caracteres es 15';
        $mensajes['content.string'] = 'El formato no es válido';
        return $mensajes;
    }



}
