<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // sender checking
            'sender_name'=>'required|max:100',
            'sender_email'=>'required',
            'sender_phone'=>'required|numeric',
            'sender_address'=>'required',
            
            // fututre checking
            'fututre_name'=>'required|max:100',
            'fututre_email'=>'required',
            'fututre_phone'=>'required|numeric',
            'fututre_address'=>'required',

            // order data checking
            'order_width'=>'required|numeric|max:5',
            'order_height'=>'required|numeric|max:5',
            'order_thickness'=>'required|numeric|max:5',
            'order_weight'=>'required|numeric|max:5',
        ];
    }
}
