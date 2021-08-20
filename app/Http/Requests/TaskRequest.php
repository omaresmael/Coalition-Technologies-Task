<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        if (request()->isMethod('put'))
        {
            return [
                'name' => 'required|string',
            ];
        }
        return [
            'name' => 'required|string',
            'priority'=>'sometimes|integer',
            'project_id'=>'required|integer|exists:projects,id',
        ];
    }
}
