<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Bookingstation;

class BookingstationRequest extends FormRequest
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
        $id = ($this->route('bookingstation')!=null)?$this->route('bookingstation')->id:0;
        return [
            // 'bs_name' => 'required|unique:bookingstations,bs_name',
            'bs_name' => [
                'required', 'string', 'max:250',
                'unique:bookingstations,bs_name,'.$id ?? 0

            ],
            'main_station' => 'required',
            // 'short_name' => 'required|unique:bookingstations,short_name',
            'short_name' => [
                'required', 'string', 'max:250',
                'unique:bookingstations,short_name,'.$id ?? 0

            ]



        ];
    }
}
