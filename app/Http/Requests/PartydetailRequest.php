<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartydetailRequest extends FormRequest
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
        $id = ($this->route('partydetail')!=null)?$this->route('partydetail')->id:0;
        return [
            'party_name' => 'required',
            'party_gstno' => [
                'required', 'string', 'max:15',
                'unique:partydetails,party_gstno,'.$id ?? 0

            ]



        ];
    }
}
