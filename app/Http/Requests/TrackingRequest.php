<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use function MongoDB\BSON\toJSON;

class TrackingRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function rules(){
      $data = [
        'name' => 'required',
        'last_name' => 'required',
        'operation_id' => 'required'
      ];
      return response()->json($data);
    }
}
