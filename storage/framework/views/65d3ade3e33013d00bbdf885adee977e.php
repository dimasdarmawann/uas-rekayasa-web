<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Kegiatan Ekstrakurikuler</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'DejaVu Sans',Arial,sans-serif;font-size:11px;color:#1e293b;}
.header{background:#4f46e5;color:white;padding:22px 28px;margin-bottom:22px;}
.header h1{font-size:18px;font-weight:800;margin-bottom:4px;}
.header p{font-size:10px;opacity:.8;}
.meta{float:right;text-align:right;font-size:10px;background:rgba(255,255,255,.15);padding:8px 14px;border-radius:6px;}
.clearfix::after{content:'';display:table;clear:both;}
.content{padding:0 28px 28px;}
table{width:100%;border-collapse:collapse;font-size:10.5px;}
thead tr{background:#1e293b;color:white;}
thead th{padding:9px 11px;text-align:left;font-weight:600;font-size:10px;text-transform:uppercase;letter-spacing:.5px;}
tbody tr:nth-child(even){background:#f8fafc;}
tbody td{padding:8px 11px;border-bottom:1px solid #f1f5f9;vertical-align:middle;}
.badge{display:inline-block;padding:3px 9px;border-radius:20px;font-size:9px;font-weight:700;background:#eef2ff;color:#4f46e5;}
.footer{margin-top:22px;padding-top:14px;border-top:2px solid #e2e8f0;display:flex;justify-content:space-between;font-size:10px;color:#64748b;}
.sign-box{text-align:center;}
.sign-name{font-weight:700;margin-top:44px;font-size:11px;border-top:1px solid #334155;padding-top:5px;}
</style>
</head>
<body>
<div class="header">
    <div class="clearfix">
        <div class="meta">
            <div><strong>Tanggal Cetak</strong></div>
            <div><?php echo e(now()->isoFormat('D MMMM Y')); ?></div>
            <div><?php echo e(now()->format('H:i')); ?> WIB</div>
        </div>
        <h1>Laporan Kegiatan Ekstrakurikuler</h1>
        <p>Ekskul Manager — Sistem Manajemen Kegiatan</p>
    </div>
</div>
<div class="content">
    <table style="margin-bottom:18px;">
        <tr>
            <td style="width:33%;border:1.5px solid #e2e8f0;padding:11px 14px;text-align:center;border-radius:7px;">
                <div style="font-size:20px;font-weight:800;color:#4f46e5;"><?php echo e($kegiatans->count()); ?></div>
                <div style="font-size:10px;color:#64748b;">Total Kegiatan</div>
            </td>
            <td style="width:4%;"></td>
            <td style="width:33%;border:1.5px solid #e2e8f0;padding:11px 14px;text-align:center;border-radius:7px;">
                <div style="font-size:20px;font-weight:800;color:#10b981;"><?php echo e($kegiatans->pluck('hari')->unique()->count()); ?></div>
                <div style="font-size:10px;color:#64748b;">Hari Aktif</div>
            </td>
            <td style="width:4%;"></td>
            <td style="width:33%;border:1.5px solid #e2e8f0;padding:11px 14px;text-align:center;border-radius:7px;">
                <div style="font-size:20px;font-weight:800;color:#f59e0b;"><?php echo e($kegiatans->pluck('pembina')->unique()->count()); ?></div>
                <div style="font-size:10px;color:#64748b;">Pembina</div>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr><th style="width:30px;">No</th><th>Nama Kegiatan</th><th>Hari</th><th>Waktu</th><th>Pembina</th></tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="font-weight:700;color:#6366f1;text-align:center;"><?php echo e($i+1); ?></td>
                <td style="font-weight:600;"><?php echo e($k->nama_kegiatan); ?></td>
                <td><span class="badge"><?php echo e($k->hari); ?></span></td>
                <td><?php echo e(\Carbon\Carbon::parse($k->waktu)->format('H:i')); ?> WIB</td>
                <td><?php echo e($k->pembina); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" style="text-align:center;padding:18px;color:#94a3b8;">Belum ada data.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="footer">
        <div>
            <div>Dicetak oleh: <strong><?php echo e(session('username','Admin')); ?></strong></div>
            <div>Ekskul Manager &copy; <?php echo e(date('Y')); ?></div>
        </div>
        <div class="sign-box">
            <div>Mengetahui,</div>
            <div style="margin-bottom:44px;">Pembina Ekstrakurikuler</div>
            <div class="sign-name">( ________________________ )</div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\laragon\www\crud_uas_nim_UAS\resources\views/kegiatan/pdf.blade.php ENDPATH**/ ?>