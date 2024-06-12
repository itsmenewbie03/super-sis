<?php

namespace App\Http\Requests;

use App\Models\Grade;
use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
        return [
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => ['required', 'string', function ($attribute, $value, $validator) {
                $studentId = $this->input('student_id');
                $subjectId = $this->input('subject_id');

                $existingGrade = Grade::where('student_id', $studentId)
                    ->where('subject_id', $subjectId)
                    ->exists();
                if($existingGrade) {
                    $validator($attribute, 'Student already has a grade for this subject.');
                }

                $valid_grades = ["1.00", "1.25", "1.50", "1.75", "2.00", "2.25", "2.50", "2.75", "3.00", "5.00","INC","DRP"];
                if(!in_array($value, $valid_grades)) {
                    $validator($attribute, 'Invalid grade.');
                }

            }]
        ];
    }
}
