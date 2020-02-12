<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'employee_id' => ['integer', 'required', Rule::unique('employees')->ignore($this->employee)],
            'name_prefix' => ['string', 'required', Rule::in(['Mr.', 'Ms.', 'Mrs.', 'Dr.', 'Drs.', 'Prof.', 'Hon.'])],
            'first_name' => ['string', 'max:50', 'required'],
            'middle_initial' => ['string', 'size:1', 'required'],
            'last_name' => ['string', 'max:50', 'required'],
            'gender' => ['string', 'required', Rule::in(['M', 'F'])],
            'email' => ['string', 'required', 'email:rfc', Rule::unique('employees')->ignore($this->employee)],
            'father_name' => ['string', 'max:50', 'required'],
            'mother_name' => ['string', 'max:50', 'required'],
            'mother_maiden_name' => ['string', 'max:50', 'required'],
            'date_of_birth' => ['date', 'required'],
            'date_of_joining' => ['date', 'required'],
            'salary' => ['integer', 'required'],
            'ssn' => ['string', 'size:11', 'required', Rule::unique('employees')->ignore($this->employee)],
            'phone' => ['string ', 'size:12', 'required', Rule::unique('employees')->ignore($this->employee)],
            'city' => ['string', 'max:50', 'required '],
            'state' => ['string', 'size:2', 'required '],
            'zip' => ['integer', 'digits:5', 'required'],
        ];

    }
}

