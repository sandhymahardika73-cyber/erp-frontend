<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    public function index()
    {
        // 1. Tembak API Backend menggunakan URL dari .env
        $response = Http::get(env('BACKEND_API_URL') . '/services');

        // 2. Ambil datanya jika berhasil
        $services = $response->successful() ? $response->json()['data'] : [];

        // 3. Kirim ke halaman Blade
        return view('services', compact('services'));
    }
}