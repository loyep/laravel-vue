<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
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
        switch (strtoupper($this->getMethod())) {
            case 'POST':
                return array_merge($this->commonRules(), $this->createRules());
                break;
            case 'PUT':
                return array_merge($this->commonRules(), $this->updateRules());
                break;
            default:
                return [];
                break;
        }
    }

    /**
     * Get the validation rules that apply to all requests.
     *
     * @return array
     */
    public function commonRules()
    {
        return [];
    }

    /**
     *  Get the validation rules that apply to create requests.
     *
     * @return array
     */
    public function createRules()
    {
        return [];
    }

    /**
     *  Get the validation rules that apply to update requests.
     *
     * @return array
     */
    public function updateRules()
    {
        return [];
    }
}
