<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;
use Input;

class AngkorCMSThemeRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'template_id' => 'required|exists:angkorcms_templates,id',
			'name' => 'required|unique:angkorcms_themes,name,NULL,id,template_id,' . Input::get('template_id'),
			'style' => 'required',
			'view' => 'required',
			'script' => 'required',
		];
	}
}
