<?php
namespace App\Http\Controllers;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class KegiatanController extends Controller {
    public function index() {
        $kegiatans = Kegiatan::latest()->get();
        return view('kegiatan.index', compact('kegiatans'));
    }
    public function create() {
        return view('kegiatan.create');
    }
    public function store(Request $request) {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'hari'          => 'required|string',
            'waktu'         => 'required',
            'pembina'       => 'required|string|max:255',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'nama_kegiatan.max'      => 'Nama kegiatan maksimal 255 karakter.',
            'hari.required'          => 'Hari wajib dipilih.',
            'waktu.required'         => 'Waktu wajib diisi.',
            'pembina.required'       => 'Nama pembina wajib diisi.',
            'pembina.max'            => 'Nama pembina maksimal 255 karakter.',
            'gambar.image'           => 'File yang diupload harus berupa gambar.',
            'gambar.mimes'           => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max'             => 'Ukuran gambar maksimal 2MB.',
        ]);
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $this->compressAndStore($request->file('gambar'));
        }
        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'hari'          => $request->hari,
            'waktu'         => $request->waktu,
            'pembina'       => $request->pembina,
            'gambar'        => $gambarPath,
        ]);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }
    public function edit($id) {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }
    public function update(Request $request, $id) {
        $kegiatan = Kegiatan::findOrFail($id);
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'hari'          => 'required|string',
            'waktu'         => 'required',
            'pembina'       => 'required|string|max:255',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'nama_kegiatan.max'      => 'Nama kegiatan maksimal 255 karakter.',
            'hari.required'          => 'Hari wajib dipilih.',
            'waktu.required'         => 'Waktu wajib diisi.',
            'pembina.required'       => 'Nama pembina wajib diisi.',
            'pembina.max'            => 'Nama pembina maksimal 255 karakter.',
            'gambar.image'           => 'File yang diupload harus berupa gambar.',
            'gambar.mimes'           => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max'             => 'Ukuran gambar maksimal 2MB.',
        ]);
        $gambarPath = $kegiatan->gambar;
        if ($request->hasFile('gambar')) {
            $gambarPath = $this->compressAndStore($request->file('gambar'));
        }
        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'hari'          => $request->hari,
            'waktu'         => $request->waktu,
            'pembina'       => $request->pembina,
            'gambar'        => $gambarPath,
        ]);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }
    public function destroy($id) {
        Kegiatan::findOrFail($id)->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }

    /**
     * Resize (max width 800px) & compress gambar sebelum disimpan,
     * biar storage gak bengkak kalo user upload foto 5-10MB dari HP.
     */
    private function compressAndStore($file) {
        $ext = strtolower($file->getClientOriginalExtension());
        $filename = 'kegiatan_' . uniqid() . '.' . ($ext === 'png' ? 'png' : 'jpg');
        $destDir = storage_path('app/public/kegiatan');
        if (!is_dir($destDir)) mkdir($destDir, 0755, true);

        [$width, $height] = getimagesize($file->getRealPath());
        $maxWidth = 800;
        $ratio = $width > $maxWidth ? $maxWidth / $width : 1;
        $newWidth = (int) ($width * $ratio);
        $newHeight = (int) ($height * $ratio);

        $src = match ($ext) {
            'png'          => imagecreatefrompng($file->getRealPath()),
            'webp'         => imagecreatefromwebp($file->getRealPath()),
            default        => imagecreatefromjpeg($file->getRealPath()),
        };
        $dst = imagecreatetruecolor($newWidth, $newHeight);
        if ($ext === 'png') {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        if ($ext === 'png') {
            imagepng($dst, $destDir . '/' . $filename, 6);
        } else {
            imagejpeg($dst, $destDir . '/' . $filename, 75);
        }
        imagedestroy($src);
        imagedestroy($dst);

        return 'kegiatan/' . $filename;
    }
    public function exportPdf() {
        $kegiatans = Kegiatan::all();
        $pdf = Pdf::loadView('kegiatan.pdf', compact('kegiatans'))->setPaper('a4', 'landscape');
        return $pdf->download('Laporan-Kegiatan-Ekstrakurikuler.pdf');
    }
}
