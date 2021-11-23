<?php

namespace Blk\Kyc\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KycRequest extends FormRequest
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
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required',
            'country' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'selfie_document' => 'required',
        ];
    }
}
