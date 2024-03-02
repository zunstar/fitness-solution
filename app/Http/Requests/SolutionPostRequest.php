<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SolutionPostRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

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
            'solutionTypes' => 'sometimes|array',
            'solutionTypes.*' => 'string|in:DIET,FITNESS',
            'tags' => 'required|array',
            'tags.*' => 'required|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'solutionTypes.array' => '배열 타입이여야 합니다.',
            'solutionTypes.*.string' => '배열의 문자열 값이 아닙니다.',
            'solutionTypes.*.in' => 'DIET 또는 FITNESS 의 값이여야 합니다.',
            'tags.required' => '태그는 필수입니다.',
            'tags.array' => '배열 타입이여야 합니다.',
            'tags.*.required' => '필수 값 입니다.',
            'tags.*.string' => '태그의 문자열 값이 아닙니다.'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        $response = response()->json([
            'message' => '유효성 검사 실패',
            'details' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
