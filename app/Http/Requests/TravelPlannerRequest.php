<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TravelPlannerRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $startDate = Carbon::create($this->startDate);
        $endDate = Carbon::create($this->endDate);

        $this->merge([
            'startDate' => $startDate->format('d-m-Y'),
            'endDate' => $endDate->format('d-m-Y'),
        ]);
    }
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'locale' => 'string|min:2|max:256',
            'startDate' => 'string|min:2|max:256',
            'endDate' => 'string|min:2|max:256'
        ];
    }

}
