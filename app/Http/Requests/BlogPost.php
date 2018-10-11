<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPost extends FormRequest
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
        $this->sanitize();

        return [
            'title' => 'bail|required|string|max:255',
            'body' => 'bail|required'
        ];
    }


    /*
    * Sanitize post inputs
    */

    public function sanitize()
    {
        // Get all input
        $input = $this->all();

        // Sanitize input for tags and special characters
        $input['title'] = filter_var($input['title'], FILTER_SANITIZE_STRING);
        $input['body'] = filter_var($input['body'], FILTER_SANITIZE_STRING);

        // Return sanitized input
        $this->replace($input);   
    }
}
