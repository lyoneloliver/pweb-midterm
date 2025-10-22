<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'student';
    }

    public function rules(): array
    {
        return [
            'class_section_id' => 'required|exists:class_sections,id',
            'semester_enrollment_id' => 'required|exists:semester_enrollments,id',
        ];
    }

    public function messages(): array
    {
        return [
            'class_section_id.required' => 'Kelas wajib dipilih.',
            'semester_enrollment_id.required' => 'Semester wajib diisi.',
        ];
    }
}
