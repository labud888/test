<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobFormRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'title' => 'required|max:255',
			'description' => 'required',
			'email' => 'required|email|max:255',
		];
	}

	/**
	 * Get the proper failed validation response for the request.
	 *
	 * @param  array  $errors
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function response(array $errors) {
		if ($this->ajax() || $this->wantsJson()) {
			return new JsonResponse($errors, 422);
		}

		return $this->redirector->to('/job')
			->withInput($this->except($this->dontFlash))
			->withErrors($errors, $this->errorBag);
	}
}
