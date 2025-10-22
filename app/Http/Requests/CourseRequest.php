<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        $courseId = $this->route('course') ? $this->route('course')->id : null;

        return [
            'code' => "required|string|max:20|unique:courses,code,{$courseId}",
            'name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:6',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'semester_offered' => 'nullable|integer|between:1,8',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Kode mata kuliah wajib diisi.',
            'name.required' => 'Nama mata kuliah wajib diisi.',
            'credits.max' => 'Jumlah SKS maksimal 6.',
            'department_id.exists' => 'Departemen tidak ditemukan.',
        ];
    }
}
