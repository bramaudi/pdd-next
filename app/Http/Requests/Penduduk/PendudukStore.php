<?php

namespace App\Http\Requests\Penduduk;

use App\Models\Label\Label;
use Illuminate\Validation\Rule;

class PendudukStore
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($request)
    {
        $request = (object)$request;

        $kawin_id = Label::whereLabel('status-perkawinan')
                            ->first()
                            ->turunan
                            ->where('label', 'KAWIN')
                            ->first()->id;

        $cerai_hidup_id = Label::whereLabel('status-perkawinan')
                            ->first()
                            ->turunan
                            ->where('label', 'CERAI HIDUP')
                            ->first()->id;

        $cerai_mati_id = Label::whereLabel('status-perkawinan')
                            ->first()
                            ->turunan
                            ->where('label', 'CERAI MATI')
                            ->first()->id;
        return [
            'rt_id'                  => 'required',
            'nik'                    => 'required',
            'nama'                   => 'required',
            'ktp_el_id'              => 'required',
            'status_rekam_id'        => 'required',
            // 'no_kk_sebelumnya'    => 'required',
            'hubungan_keluarga_id'   => 'required',
            'jenis_kelamin_id'       => 'required',
            'agama_id'               => 'required',
            'status_kependudukan_id' => 'required',
            'akta_lahir'             => 'required',
            'tempat_lahir'           => 'required',
            'tanggal_lahir'          => 'required',
            'waktu_lahir'            => 'required',
            'jenis_kelahiran_id'     => 'required',
            'kelahiran_anak_ke'      => 'required',
            'penolong_kelahiran_id'  => 'required',
            'tempat_dilahirkan_id'   => 'required',
            'berat_lahir'            => 'required',
            'panjang_lahir'          => 'required',
            'pendidikan_id'          => 'required',
            'pekerjaan_id'           => 'required',
            'kewarganegaraan_id'     => 'required',
            // 'dokumen_paspor'      => 'required',
            // 'tanggal_akhir_paspor' => 'required',
            // 'dokumen_kitas'       => 'required',
            'nik_ayah'               => 'required',
            'nama_ayah'              => 'required',
            'nik_ibu'                => 'required',
            'nama_ibu'               => 'required',
            'ponsel'                 => 'required',
            // 'alamat_sebelumnya'   => 'required',
            'alamat'                 => 'required',
            'status_perkawinan_id'   => 'required',
            'akta_kawin'             => Rule::requiredIf($request->status_perkawinan_id === $kawin_id),
            'tanggal_kawin'          => Rule::requiredIf($request->status_perkawinan_id === $kawin_id),
            'akta_cerai'             => Rule::requiredIf($request->status_perkawinan_id === $cerai_hidup_id || $request->status_perkawinan_id === $cerai_mati_id),
            'tanggal_cerai'          => Rule::requiredIf($request->status_perkawinan_id === $cerai_hidup_id || $request->status_perkawinan_id === $cerai_mati_id),
            'golongan_darah_id'      => 'required',
            'cacat_id'               => 'required',
            'sakit_menahun_id'       => 'required',
            // 'cara_kb_id'          => 'required',
        ];
    }

    /**
     * Set custom attribute name.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'rt_id'                  => 'RT',
            'nik'                    => 'NIK',
            'nama'                   => 'Nama',
            'ktp_el_id'              => 'Status KTP-EL',
            'status_rekam_id'        => 'Status Rekam',
            'no_kk_sebelumnya'       => 'No. KK sebelumnya',
            'hubungan_keluarga_id'   => 'Hubungan Keluarga',
            'jenis_kelamin_id'       => 'Jenis Kelamin',
            'agama_id'               => 'Agama',
            'status_kependudukan_id' => 'Status Kependudukan',
            'akta_lahir'             => 'No. Akta Kelahiran',
            'tempat_lahir'           => 'Tempat Lahir',
            'tanggal_lahir'          => 'Tanggal Lahir',
            'waktu_lahir'            => 'Waktu Lahir',
            'jenis_kelahiran_id'     => 'Jenis Kelahiran',
            'kelahiran_anak_ke'      => 'Kelahiran Anak KE',
            'penolong_kelahiran_id'  => 'Penolong Kelahiran',
            'tempat_dilahirkan_id'   => 'Tempat Dilahirkan',
            'berat_lahir'            => 'Berat Lahir',
            'panjang_lahir'          => 'Panjang Lahir',
            'pendidikan_id'          => 'Pendidikan',
            'pekerjaan_id'           => 'Pekerjaan',
            'kewarganegaraan_id'     => 'Kewarganegaraan',
            'dokumen_paspor'         => 'Paspor',
            'tanggal_akhir_paspor'   => 'Tanggal Paspor Berakhir',
            'dokumen_kitas'          => 'KITAS / KITAP',
            'nik_ayah'               => 'NIK Ayah',
            'nama_ayah'              => 'Nama Ayah',
            'nik_ibu'                => 'NIK Ibu',
            'nama_ibu'               => 'Nama Ibu',
            'ponsel'                 => 'Telepon',
            'alamat_sebelumnya'      => 'Alamat Sebelumnya',
            'alamat'                 => 'Alamat',
            'status_perkawinan_id'   => 'Status Perkawinan',
            'akta_kawin'             => 'No. Akta Perkawinan',
            'tanggal_kawin'          => 'Tanggal Perkawinan',
            'akta_cerai'             => 'No. Akta Perceraian',
            'tanggal_cerai'          => 'Tanggal Cerai',
            'golongan_darah_id'      => 'Golongan Darah',
            'cacat_id'               => 'Cacat',
            'sakit_menahun_id'       => 'Sakit Menahun',
            'cara_kb_id'             => 'Akseptor KB',
        ];
    }
}
