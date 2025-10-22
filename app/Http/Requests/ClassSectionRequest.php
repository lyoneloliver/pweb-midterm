<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        $sectionId = $this->route('class_section') ? $this->route('class_section')->id : null;

        return [
            'course_id' => 'required|exists:courses,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'lecturer_id' => 'nullable|exists:lecturers,id',
            'section_name' => "required|string|max:10|unique:class_sections,section_name,{$sectionId},id,course_id,{$this->course_id},academic_year_id,{$this->academic_year_id}",
            'max_students' => 'required|integer|min:1|max:100',
            'room' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Mata kuliah wajib dipilih.',
            'academic_year_id.required' => 'Tahun akademik wajib diisi.',
            'section_name.unique' => 'Kelas ini sudah ada di tahun akademik tersebut.',
        ];
    }
}
