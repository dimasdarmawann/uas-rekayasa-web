@extends('layouts.app')
@section('title','Data Kegiatan')
@section('header','Data Kegiatan Ekstrakurikuler')
@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div style="width:50px;height:50px;background:linear-gradient(135deg,#6366f1,#a855f7);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fas fa-calendar-check text-white" style="font-size:19px;"></i>
                </div>
                <div>
                    <div style="font-size:26px;font-weight:800;color:#0f172a;">{{ $kegiatans->count() }}</div>
                    <div style="font-size:12px;color:#64748b;font-weight:500;">Total Kegiatan</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div style="width:50px;height:50px;background:linear-gradient(135deg,#06b6d4,#22d3ee);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fas fa-calendar-alt text-white" style="font-size:19px;"></i>
                </div>
                <div>
                    <div style="font-size:26px;font-weight:800;color:#0f172a;">{{ $kegiatans->pluck('hari')->unique()->count() }}</div>
                    <div style="font-size:12px;color:#64748b;font-weight:500;">Hari Aktif</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div style="width:50px;height:50px;background:linear-gradient(135deg,#f59e0b,#f97316);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fas fa-user-tie text-white" style="font-size:19px;"></i>
                </div>
                <div>
                    <div style="font-size:26px;font-weight:800;color:#0f172a;">{{ $kegiatans->pluck('pembina')->unique()->count() }}</div>
                    <div style="font-size:12px;color:#64748b;font-weight:500;">Pembina</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header-custom">
        <h6><i class="fas fa-table" style="color:#6366f1;"></i>Daftar Kegiatan Ekstrakurikuler</h6>
        <div class="d-flex gap-2 flex-wrap align-items-center">
            <select id="filterHari" class="form-select form-select-sm" style="width:auto;min-width:150px;">
                <option value="">Semua Hari</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
                    <option value="{{ $h }}">{{ $h }}</option>
                @endforeach
            </select>
            <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Tambah</a>
            <a href="{{ route('kegiatan.pdf') }}" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf me-1"></i>PDF</a>
        </div>
    </div>
    <div class="p-4">
        <div class="table-responsive">
            <table id="tbl" class="table table-hover align-middle w-100">
                <thead>
                    <tr>
                        <th>No</th><th>Gambar</th><th>Nama Kegiatan</th><th>Hari</th><th>Waktu</th><th>Pembina</th><th>Update Terakhir</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kegiatans as $i => $k)
                    <tr>
                        <td style="font-weight:700;color:#6366f1;width:50px;">{{ $i+1 }}</td>
                        <td style="width:80px;">
                            @if($k->gambar)
                                <img src="{{ asset($k->gambar) }}" style="width:72px;height:52px;object-fit:contain;border-radius:9px;border:2px solid #f1f5f9;background:#0b1d3a;padding:4px;transition:transform .2s;" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                            @else
                                <div style="width:64px;height:46px;background:#f8fafc;border-radius:9px;display:flex;align-items:center;justify-content:center;border:2px dashed #e2e8f0;">
                                    <i class="fas fa-image" style="color:#cbd5e1;font-size:16px;"></i>
                                </div>
                            @endif
                        </td>
                        <td style="font-weight:600;color:#1e293b;">{{ $k->nama_kegiatan }}</td>
                        <td>
                            @php $hariColor=['Senin'=>'#6366f1','Selasa'=>'#8b5cf6','Rabu'=>'#10b981','Kamis'=>'#f59e0b','Jumat'=>'#ef4444','Sabtu'=>'#3b82f6']; $c=$hariColor[$k->hari]??'#64748b'; @endphp
                            <span style="background:{{ $c }}14;color:{{ $c }};padding:5px 14px;border-radius:20px;font-size:12px;font-weight:600;display:inline-flex;align-items:center;gap:5px;">
                                <span style="width:6px;height:6px;border-radius:50%;background:{{ $c }};display:inline-block;"></span>
                                {{ $k->hari }}
                            </span>
                        </td>
                        <td><i class="fas fa-clock me-1" style="color:#94a3b8;font-size:11px;"></i>{{ \Carbon\Carbon::parse($k->waktu)->format('H:i') }} WIB</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:30px;height:30px;background:linear-gradient(135deg,#6366f1,#a855f7);border-radius:9px;display:flex;align-items:center;justify-content:center;color:white;font-size:11px;font-weight:700;flex-shrink:0;">{{ strtoupper(substr($k->pembina,0,1)) }}</div>
                                <span style="font-size:13.5px;">{{ $k->pembina }}</span>
                            </div>
                        </td>
                        <td><i class="fas fa-clock me-1" style="color:#94a3b8;font-size:11px;"></i>{{ \Carbon\Carbon::parse($k->updated_at)->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('kegiatan.edit',$k->id_kegiatan) }}" class="btn btn-warning btn-sm px-3 py-1"><i class="fas fa-edit me-1"></i>Edit</a>
                                <form action="{{ route('kegiatan.destroy',$k->id_kegiatan) }}" method="POST" class="form-delete">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3 py-1"><i class="fas fa-trash me-1"></i>Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center py-5" style="color:#94a3b8;">
                        <i class="fas fa-calendar-times d-block" style="font-size:40px;color:#e2e8f0;margin-bottom:12px;"></i>
                        Belum ada data kegiatan
                    </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function(){
    var table = $('#tbl').DataTable({
        language:{search:"Cari:",lengthMenu:"Tampilkan _MENU_ data",info:"Data _START_–_END_ dari _TOTAL_",paginate:{previous:"‹",next:"›"},zeroRecords:"Tidak ditemukan",emptyTable:"Belum ada data"},
        order:[[0,'asc']],
        columnDefs:[{orderable:false,targets:[1,7]}]
    });

    // Filter dropdown Hari (poin 5)
    $('#filterHari').on('change', function(){
        table.column(3).search(this.value).draw();
    });

    // SweetAlert2 pengganti confirm() bawaan browser (poin 2)
    $('.form-delete').on('submit', function(e){
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: 'Data kegiatan ini bakal dihapus permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) form.submit();
        });
    });
});
</script>
@endpush