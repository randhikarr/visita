<?php
/**
 * Visita - Museum Form Request Validation
 * File: app/Http/Requests/MuseumRequest.php
 * 
 * OPTIONAL: Cara pakai (lebih clean daripada Validator::make)
 * Di controller ganti: validate($request->all()) jadi MuseumRequest $request
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MuseumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'nama_museum' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'jam_operasional' => 'nullable|string|max:100',
            'harga_tiket' => 'nullable|string|max:100',
            'foto_url' => 'nullable|url|max:255',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'nama_museum.required' => 'Nama museum wajib diisi',
            'latitude.required' => 'Latitude wajib diisi',
            'latitude.between' => 'Latitude harus antara -90 dan 90',
            'longitude.required' => 'Longitude wajib diisi',
            'longitude.between' => 'Longitude harus antara -180 dan 180',
            'foto_url.url' => 'URL foto tidak valid',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}