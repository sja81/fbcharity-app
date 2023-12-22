<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zxing\QrReader;

class QRCodeController extends Controller
{
    public function decodeQRCode(Request $request)
    {
        $request->validate([
            'qrcode_image_data' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('qrcode_image_data');
        $qrcode = new QrReader($image);
        $text = $qrcode->text();

        return view('logged in', ['text' => $text]);
    }
}
