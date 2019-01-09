<?php

namespace App\Http\Requests;
use App\lan_types;
use Illuminate\Foundation\Http\FormRequest;

class EditDrinkRequest extends FormRequest
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
            'type_id'=>'required | min:1 | max:3',
            'drink'=>'required | min:1 | max:8' ,
            'drink_price'=>'required | min:1 | max:5 | integer'
        ];
    }
}
