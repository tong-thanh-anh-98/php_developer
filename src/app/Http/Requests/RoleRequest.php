<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $roleId = $this->route('id'); // Lấy ID của role từ URL (chỉ dành cho update)

        return [
            'name' => 'required|unique:roles,name,' . $roleId . ',id|min:3', // Thêm phần ignore
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Role name is required.',
            'name.unique'   => 'Role name already exists.',
            'name.min'      => 'Role name must be at least :min characters.',
        ];
    }
}
