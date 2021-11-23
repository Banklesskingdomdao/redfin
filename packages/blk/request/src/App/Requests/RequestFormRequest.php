<?php

namespace Blk\Request\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormRequest extends FormRequest
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
        return [
        'user_id' => 'required',
        'condition_id' => 'required|not_in:0',
        'type_id' => 'required|not_in:0',
        'property_address' => 'required',
        'property_location' => 'required',
        'property_description' => 'required',
        'monthly_income' => 'required|numeric',
        'yearly_income' => 'required|numeric',
        'property_value' => 'required|numeric',
        'amount_of_existing_loan' => 'required|numeric',
        'amount_of_loan_needed' => 'required|numeric'         
        ];
    }
}
