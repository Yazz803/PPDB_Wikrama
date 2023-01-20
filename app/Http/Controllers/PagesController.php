<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.landingpage');
    }

    public function formPage() {
        return view('form.index');
    }

    public function dashboard() {
        $pembayarans = Pembayaran::where('user_id', auth()->user()->id)->latest()->get();
        $allPembayarans = Pembayaran::all();
        return view('dashboard.index', compact('pembayarans', 'allPembayarans'));
    }

    public function dashboardPembayaranUser() {
        $pembayarans = Pembayaran::where('user_id', auth()->user()->id)->get();
        $pembayaran = Pembayaran::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
        $checkP = Pembayaran::where('user_id', auth()->user()->id)->exists();
        return view('dashboard.pembayaranUser', [
            'pembayarans' => $pembayarans,
            'pembayaran' => $pembayaran,
            'checkP' => $checkP
        ]);
    }
}
