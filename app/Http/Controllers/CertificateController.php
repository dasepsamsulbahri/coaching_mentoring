<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
        ]);

        $certificate = Certificate::create([
            'participant_name' => $request->participant_name,
            'course_name' => $request->course_name,
        ]);

        $qrCodePath = 'qrcodes/' . $certificate->id . '.png';
        $fullPath = storage_path('app/public/' . $qrCodePath);

        // Cek apakah folder qrcodes sudah ada, jika belum buat folder tersebut
        if (!file_exists(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        QrCode::format('png')->size(200)->generate(route('certificates.verify', $certificate->id), $fullPath);

        $certificate->update(['qr_code_path' => $qrCodePath]);

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil dibuat dengan QR Code!');
    }

    public function shareQrCode($id)
    {
        $certificate = Certificate::find($id);

        if ($certificate) {
            $qrCodePath = $certificate->qr_code_path;
            return response()->download(storage_path('app/public/' . $qrCodePath));
        } else {
            return redirect()->route('certificates.index')->with('error', 'QR Code tidak ditemukan.');
        }
    }

    public function verify($id)
    {
        $certificate = Certificate::find($id);

        if ($certificate) {
            return view('certificates.verify', compact('certificate'));
        } else {
            return view('certificates.notfound');
        }
    }
}