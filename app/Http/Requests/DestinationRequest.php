<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationRequest extends FormRequest
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
        $id = ($this->route('destination')!=null)?$this->route('destination')->id:0;
        return [

            'destination_name' => [
                'required', 'string', 'max:250',
                'unique:destinations,destination_name,'.$id ?? 0

            ],
            'main_station' => 'required',
            // 'short_name' => 'required|unique:destinations,short_name',
            'short_name' => [
                'required', 'string', 'max:250',
                'unique:destinations,short_name,'.$id ?? 0

            ],

            // 'status' => ['accepted'],


        ];

    }
}
