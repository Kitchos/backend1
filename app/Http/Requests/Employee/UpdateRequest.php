<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'nullable|string',
            'sex' => 'nullable|string',
            'wage' => 'nullable|integer',
            'department_ids' => 'required|array',
            'department_ids.*' => 'required|integer',
        ];
    }
}
