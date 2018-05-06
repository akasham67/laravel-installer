<?php

namespace Shamim\LaravelInstaller\Request;



class SetupRequest extends CoreRequest
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
            'system_email' => 'required',
            'password' => 'required',
        ];
    }

}
