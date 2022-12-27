<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Http\Request;
use PDF;

class BiodataController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nisn' => 'required|max:11|unique:biodatas',
            'nama' => 'required',
            'jk' => 'required',
            'asal_sekolah' => 'required',
            'email' => 'required|unique:users|unique:biodatas',
            'nomor_hp' => 'required',
            'nomor_hp_ayah' => 'required',
            'nomor_hp_ibu' => 'required',
        ],[
            'nisn.required' => "NISN tidak boleh kosong",
            'nisn.unique' => "NISN sudah terdaftar",
            'nisn.max' => "NISN tidak boleh lebih dari 11 karakter",
            'nama.required' => "Nama tidak boleh kosong",
            'jk.required' => "Jenis Kelamin tidak boleh kosong",
            'asal_sekolah.required' => "Asal Sekolah tidak boleh kosong",
            'email.required' => "Email tidak boleh kosong",
            'email.unique' => "Email sudah terdaftar",
            'nomor_hp.required' => "Nomor HP tidak boleh kosong",
            'nomor_hp_ayah.required' => "Nomor HP Ayah tidak boleh kosong",
            'nomor_hp_ibu.required' => "Nomor HP Ibu tidak boleh kosong",
        ]);

        $validatedData['no_seleksi'] = mt_rand(1,1111);
        if($request->asal_sekolah_lainnya != NULL){
            $validatedData['asal_sekolah'] = $request->asal_sekolah_lainnya;
        }elseif($request->asal_sekolah == 'lainnya'){
            if($request->asal_sekolah_lainnya == NULL){
                return back()->with('error_asal_sekolah_lainnya', 'Asal Sekolah tidak boleh kosong');
            }
            $validatedData['asal_sekolah'] = $request->asal_sekolah_lainnya;
        }
        
        Biodata::create($validatedData);
        $biodataPalingBaru = Biodata::latest()->first();
        
        User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['nisn']),
            'role' => 'user',
            'biodata_id' => $biodataPalingBaru->id
        ]);

        $userPalingBaru = User::latest()->first();
        if(strlen($userPalingBaru->id) == 1){
            $nomorSeleksi = '00' . $userPalingBaru->id;
        }elseif(strlen($userPalingBaru->id) == 2){
            $nomorSeleksi = '0' . $userPalingBaru->id;
        }else{
            $nomorSeleksi = $userPalingBaru->id;
        }
        Biodata::where('nisn', $request->nisn)
                -> update([
                    'user_id' => $userPalingBaru->id,
                    'no_seleksi' => $nomorSeleksi
                ]);
        
        $pdf = PDF::loadView('form.pdfRegister', [
            'biodata' => Biodata::latest()->first(),
        ])->setPaper('a4', 'landscape');

        return $pdf->download(str_replace(' ', '_', $validatedData['nama']) . '_' . $validatedData['nisn'] . '.pdf');

        // return back()->with('success', 'Pendaftaran berhasil!');

    }
}
