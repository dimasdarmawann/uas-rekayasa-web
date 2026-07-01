<?php $__env->startSection('title','Tambah Kegiatan'); ?>
<?php $__env->startSection('header','Tambah Kegiatan Baru'); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card">
    <div class="card-header-custom">
        <h6><i class="fas fa-plus-circle" style="color:#a855f7;"></i>Form Tambah Kegiatan</h6>
        <a href="<?php echo e(route('kegiatan.index')); ?>" class="btn-secondary-custom">
            <i class="fas fa-arrow-left"></i>Kembali
        </a>
    </div>
    <div class="p-4">
        <form action="<?php echo e(route('kegiatan.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Nama Kegiatan <span style="color:#ef4444;">*</span></label>
                <input type="text" name="nama_kegiatan" class="form-control <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nama_kegiatan')); ?>" placeholder="Contoh: Pramuka, OSIS, Futsal">
                <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><i class="fas fa-times-circle"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label">Hari <span style="color:#ef4444;">*</span></label>
                    <select name="hari" class="form-select <?php $__errorArgs = ['hari'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">-- Pilih Hari --</option>
                        <?php $__currentLoopData = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hari): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($hari); ?>" <?php echo e(old('hari')==$hari?'selected':''); ?>><?php echo e($hari); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['hari'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><i class="fas fa-times-circle"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Waktu <span style="color:#ef4444;">*</span></label>
                    <input type="time" name="waktu" class="form-control <?php $__errorArgs = ['waktu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('waktu')); ?>">
                    <?php $__errorArgs = ['waktu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><i class="fas fa-times-circle"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Pembina <span style="color:#ef4444;">*</span></label>
                <input type="text" name="pembina" class="form-control <?php $__errorArgs = ['pembina'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('pembina')); ?>" placeholder="Nama pembina kegiatan">
                <?php $__errorArgs = ['pembina'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><i class="fas fa-times-circle"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="mb-4">
                <label class="form-label">Gambar</label>
                <div class="upload-area" id="uploadArea" onclick="document.getElementById('gambarInput').click()" style="border:2px dashed #e2e8f0;border-radius:12px;padding:2rem;text-align:center;cursor:pointer;transition:all .25s;background:#fafbfc;" onmouseover="this.style.borderColor='#a855f7';this.style.background='#faf5ff'" onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc'">
                    <i class="fas fa-cloud-upload-alt" style="font-size:36px;color:#cbd5e1;display:block;margin-bottom:8px;"></i>
                    <div style="font-weight:600;color:#475569;font-size:14px;">Klik untuk upload gambar</div>
                    <div style="font-size:12px;color:#94a3b8;margin-top:4px;">JPG, PNG, WEBP. Maks 2MB.</div>
                </div>
                <input type="file" name="gambar" id="gambarInput" class="form-control <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*" onchange="prev(this)" style="display:none;">
                <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback d-block"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div id="pw" style="display:none;margin-top:14px;position:relative;">
                    <img id="pi" src="#" style="height:140px;border-radius:12px;object-fit:contain;background:#0b1d3a;padding:12px;box-shadow:0 4px 12px rgba(0,0,0,.08);width:auto;aspect-ratio:auto;">
                    <button type="button" onclick="document.getElementById('gambarInput').value='';document.getElementById('pw').style.display='none';" style="position:absolute;top:8px;left:8px;background:#ef4444;color:white;border:none;border-radius:50%;width:28px;height:28px;font-size:12px;cursor:pointer;display:flex;align-items:center;justify-content:center;opacity:.9;transition:opacity .2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='.9'"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-primary px-5"><i class="fas fa-save me-2"></i>Simpan</button>
                <a href="<?php echo e(route('kegiatan.index')); ?>" class="btn-secondary-custom px-4"><i class="fas fa-times"></i>Batal</a>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\crud_uas_nim_UAS\resources\views/kegiatan/create.blade.php ENDPATH**/ ?>