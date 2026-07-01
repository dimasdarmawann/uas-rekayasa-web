@extends('layouts.app')
@section('title','Edit Kegiatan')
@section('header','Edit Kegiatan')
@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card">
    <div class="card-header-custom">
        <h6><i class="fas fa-edit" style="color:#f97316;"></i>Form Edit Kegiatan</h6>
        <a href="{{ route('kegiatan.index') }}" class="btn-secondary-custom">
            <i class="fas fa-arrow-left"></i>Kembali
        </a>
    </div>
    <div class="p-4">
        <form action="{{ route('kegiatan.update',$kegiatan->id_kegiatan) }}" method="POST" enctype="multipart/form-data" id="formKegiatanEdit">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Kegiatan <span style="color:#ef4444;">*</span></label>
                <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan',$kegiatan->nama_kegiatan) }}">
                @error('nama_kegiatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label">Hari <span style="color:#ef4444;">*</span></label>
                    <select name="hari" class="form-select @error('hari') is-invalid @enderror">
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari',$kegiatan->hari)==$hari?'selected':'' }}>{{ $hari }}</option>
                        @endforeach
                    </select>
                    @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Waktu <span style="color:#ef4444;">*</span></label>
                    <input type="time" name="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{ old('waktu',$kegiatan->waktu) }}">
                    @error('waktu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Pembina <span style="color:#ef4444;">*</span></label>
                <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina',$kegiatan->pembina) }}">
                @error('pembina')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Gambar</label>
                @if($kegiatan->gambar)
                    <div class="mb-3 d-flex align-items-center gap-3 p-3" style="background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;">
                        <img src="{{ asset('storage/'.$kegiatan->gambar) }}" style="height:90px;width:130px;object-fit:contain;border-radius:10px;border:2px solid #fff;background:#0b1d3a;padding:6px;box-shadow:0 2px 8px rgba(0,0,0,.06);">
                        <div>
                            <div style="font-size:13px;font-weight:600;color:#1e293b;">Gambar saat ini</div>
                            <div style="font-size:12px;color:#94a3b8;">Upload baru untuk mengganti</div>
                        </div>
                    </div>
                @endif
                <div class="upload-area" id="uploadArea" onclick="document.getElementById('gambarInput').click()" style="border:2px dashed #e2e8f0;border-radius:12px;padding:2rem;text-align:center;cursor:pointer;transition:all .25s;background:#fafbfc;" onmouseover="this.style.borderColor='#a855f7';this.style.background='#faf5ff'" onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc'">
                    <i class="fas fa-cloud-upload-alt" style="font-size:36px;color:#cbd5e1;display:block;margin-bottom:8px;"></i>
                    <div style="font-weight:600;color:#475569;font-size:14px;">Klik untuk upload gambar</div>
                    <div style="font-size:12px;color:#94a3b8;margin-top:4px;">Kosongkan jika tidak ingin mengganti</div>
                </div>
                <input type="file" name="gambar" id="gambarInput" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" onchange="prev(this)" style="display:none;">
                @error('gambar')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                <div id="pw" style="display:none;margin-top:14px;position:relative;">
                    <img id="pi" src="#" style="height:140px;border-radius:12px;object-fit:contain;background:#0b1d3a;padding:12px;box-shadow:0 4px 12px rgba(0,0,0,.08);width:auto;aspect-ratio:auto;">
                    <button type="button" onclick="document.getElementById('gambarInput').value='';document.getElementById('pw').style.display='none';" style="position:absolute;top:8px;left:8px;background:#ef4444;color:white;border:none;border-radius:50%;width:28px;height:28px;font-size:12px;cursor:pointer;display:flex;align-items:center;justify-content:center;opacity:.9;transition:opacity .2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='.9'"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="d-flex gap-2 pt-2">
                <button type="submit" id="btnUpdate" style="background:linear-gradient(135deg,#f59e0b,#f97316);border:none;color:white;font-weight:700;padding:10px 28px;border-radius:10px;cursor:pointer;font-size:14px;transition:all .3s;box-shadow:0 4px 12px rgba(245,158,11,.3);display:inline-flex;align-items:center;gap:8px;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(245,158,11,.35)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 12px rgba(245,158,11,.3)'">
                    <i class="fas fa-save"></i>Update Data
                </button>
                <a href="{{ route('kegiatan.index') }}" class="btn-secondary-custom px-4"><i class="fas fa-times"></i>Batal</a>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
@push('scripts')
<script>
function prev(i) {
    if (i.files && i.files[0]) {
        const r = new FileReader();
        r.onload = function(e) {
            document.getElementById('pi').src = e.target.result;
            document.getElementById('pw').style.display = 'block';
        };
        r.readAsDataURL(i.files[0]);
    }
}
document.getElementById('formKegiatanEdit').addEventListener('submit', function(){
    const btn = document.getElementById('btnUpdate');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Memperbarui...';
});
</script>
@endpush
