<?php

namespace App\Http\Requests;

use App\Rules\AudioFileFormat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSongPost extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (!Auth::user()) {
      return false;
    }
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    // $imageType = ['png', 'jpeg', 'jpg'];
    // dd($this->file('image'));
    return [
      'title' => 'bail|required|string|min:5',
      'writer' => 'bail|required|string|min:5',
      'producer' => 'bail|required|string|min:5',
      'audio' => ['bail', 'required', new AudioFileFormat],
      'image' => 'bail|required|image',
      'source' => 'bail|required|string|min:5',
      'category' => 'bail|required',
      'description' => 'bail|required|string|min:5'
    ];
  }
}
