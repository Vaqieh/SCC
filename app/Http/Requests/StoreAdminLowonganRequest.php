<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminLowonganRequest extends FormRequest
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
            // 'admin_id' => 'required|exists:admins,id',
            // 'perusahaan_id' => 'required|exists:kelola_perusahaans,id',
            // 'nama_lowongan' => 'required|string|max:255',
            // 'status_lowongan' => 'required|string|max:50',
            // 'tanggal_buat' => 'required|date',
            // 'tanggal_berakhir' => 'required|date',
            // 'tanggal_verifikasi' => 'nullable|date',
            // 'pendidikan' => 'required|string|max:255',
            // 'pengalaman_kerja' => 'required|string|max:255',
            // 'umur' => 'required|integer|min:18',
            // 'gambar_lowongan' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            // 'detail' => 'required|string|max:255',
        ];
    }
}
