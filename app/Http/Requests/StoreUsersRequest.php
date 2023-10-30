<?php

namespace App\Http\Requests;

use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(\Illuminate\Http\Request $request): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            User::PHONE=>'required|numeric',
            User::PROFILE=>'mimes:jpg,jpeg,png,bmp,tiff ',
        ];
    }
}
