<?php

namespace App\Http\Requests\Admin\Discount;

// use App\Http\Controllers\Controller;
// use App\Models\Discount;
// use Illuminate\Http\Request;
// use App\Http\Requests\Admin\Discount\Store;
use Illuminate\Foundation\Http\FormRequest;
use Auth;


class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'code' => 'required|string|max:5|unique:discounts',
            'description' => 'nullable|string',
            'percentage' => 'required|min:1|max:100|numeric',
            'discount' => 'nullable|string|exists:discount,code,deleted_at,NULL'
        ];
    }
}