<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function decodeQRCode(Request $request)
    {
        $request->validate([
            'decodedText' => 'required|string|regex:/^[0-9]+$/',
        ]);

        $text = $request->input('decodedText');

        return view('logged in', ['text' => $text]);
    }
}
