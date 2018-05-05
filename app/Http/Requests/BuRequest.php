<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * 'bu_name', 'bu_price', 'bu_rent', 'bu_square', 'bu_type',
    'bu_small_dis', 'bu_meta', 'bu_langtuite', 'bu_latitude',
    'bu_larg_dis', 'bu_status', 'user_id','rooms'
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

            'bu_name'=>'required|min:5|max:100',
            'bu_price' =>'required',
            'bu_rent'=>'required|integer',
            'bu_square'=>'required|min:2|max:100',
            'bu_type'=>'required|integer',
            //'bu_small_dis'=>'required|min:5|max:160',
            'bu_meta'=>'required|min:5|max:200',
            'bu_langtuite'=>'required',
            'bu_latitude'=>'required',
            'bu_larg_dis'=>'required|min:5',
            //'bu_status'=>'required|integer',

            'rooms'=>'required|integer',
            'image'=>'mimes:jpeg,bmp,png,jpg',
            'bu_place'=>'required',
        ];
    }
}
