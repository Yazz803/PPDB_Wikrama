<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bank' => 'required',
            'nama_pemilik' => 'required',
            'nominal' => 'required|min:2',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ],[
            'nama_bank.required' => 'Nama Bank tidak boleh kosong',
            'nama_pemilik.required' => 'Nama Pemilik tidak boleh kosong',
            'nominal.required' => 'Nominal tidak boleh kosong',
            'nominal.min' => 'Nominal tidak boleh kurang dari 2',
            'bukti_pembayaran.required' => 'Bukti Pembayaran tidak boleh kosong',
            'bukti_pembayaran.image' => 'Bukti Pembayaran harus berupa gambar',
            'bukti_pembayaran.mimes' => 'Bukti Pembayaran harus berupa gambar dengan format jpeg, png, jpg',
            'bukti_pembayaran.max' => 'Bukti Pembayaran maksimal 5MB',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['biodata_id'] = auth()->user()->biodata->id;
        if($request->nama_bank_lainnya != NULL){
            $validatedData['nama_bank'] = $request->nama_bank_lainnya;
        }

        if($request->file('bukti_pembayaran')){
            // Buat Folder baru
            // $imagePath = public_path('/assets/buktiPembayaran/');
            // if(!file_exists($imagePath)){
            //     mkdir($imagePath, 666, true);
            // }
            $image = $request->file('bukti_pembayaran');
            // $imageSize = round($image->getSize() / 1000); // Ngitung size gambar dalam KB
            $imageName = 'Pembayaran_' . $request->nama_pemilik . '_' . auth()->user()->biodata->nisn . '.' . $image->extension();
            // if($imageSize > 1024){
            //     $img = Image::make($image->path());
            //     $img->resize(500,500, function ($const) {
            //         $const->aspectRatio();
            //     })->save(public_path('/assets/buktiPembayaran/' . $imageName));
            // }else{
                $image->move(public_path('/assets/buktiPembayaran'), $imageName);
            // }
            $validatedData['bukti_pembayaran'] = $imageName;
        }


        Pembayaran::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function updateTolakPembayaran(Request $request, Pembayaran $pembayaran)
    {
        if($request->message == '' || $request->message == false){
            return back();
        }
        $pembayaran->update([
            'status' => 'di tolak',
            'message' => $request->message
        ]);

        return back();
    }

    public function updateVerifikasiPembayaran(Pembayaran $pembayaran)
    {
        $pembayaran->update([
            'status' => 'di verifikasi'
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
