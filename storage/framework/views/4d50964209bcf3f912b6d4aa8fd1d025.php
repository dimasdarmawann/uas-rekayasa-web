<!DOCTYPE html>
<html lang="id">
<head>
    <script>const d=localStorage.getItem('darkmode');if(d==='true')document.documentElement.classList.add('dark');</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EkskulManager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth}
        body{font-family:'Segoe UI',system-ui,-apple-system,sans-serif;background:#f0f2f5;color:#1a1a2e;overflow-x:hidden}
        .navbar{position:sticky;top:0;z-index:100;background:rgba(15,23,42,.92);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);padding:0 2rem;height:64px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,.06)}
        .nav-logo{display:flex;align-items:center;gap:10px;color:#fff;font-weight:800;font-size:20px;text-decoration:none;letter-spacing:-.5px}
        .nav-logo i{color:#22d3ee;font-size:26px;transition:transform .3s ease}
        .nav-logo:hover i{transform:rotate(15deg)}
        .nav-logo span{color:#22d3ee}
        .btn-admin{background:linear-gradient(135deg,#6366f1,#a855f7);color:#fff;border:none;padding:9px 20px;border-radius:10px;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:7px;text-decoration:none;transition:all .3s ease;box-shadow:0 4px 14px rgba(99,102,241,.3)}
        .btn-admin:hover{background:linear-gradient(135deg,#4f46e5,#7c3aed);transform:translateY(-2px);box-shadow:0 6px 20px rgba(99,102,241,.4)}
        .hero{position:relative;padding:3.5rem 2rem 4rem;text-align:center;color:#fff;overflow:hidden;background:linear-gradient(135deg,#0b1120 0%,#1e1b4b 35%,#4338ca 70%,#6366f1 100%)}
        .hero::before{content:'';position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:radial-gradient(circle at 30% 50%,rgba(99,102,241,.12) 0%,transparent 50%),radial-gradient(circle at 70% 50%,rgba(168,85,247,.1) 0%,transparent 50%);animation:heroShift 8s ease-in-out infinite alternate}
        @keyframes heroShift{0%{transform:translate(0,0)}100%{transform:translate(-2%,-2%)}}
        .hero-content{position:relative;z-index:1}
        .hero h1{font-size:clamp(24px,4vw,38px);font-weight:800;margin-bottom:10px;animation:fadeUp .6s ease-out}
        .hero p{color:rgba(196,181,253,.8);font-size:15px;margin-bottom:1.75rem;animation:fadeUp .6s ease-out .1s both}
        .search-wrap{display:flex;gap:10px;justify-content:center;margin-bottom:1.25rem;animation:fadeUp .6s ease-out .2s both}
        .search-wrap input{padding:12px 20px;border-radius:12px;border:none;font-size:14px;width:340px;background:rgba(255,255,255,.12);backdrop-filter:blur(8px);color:#fff;outline:none;transition:all .3s ease}
        .search-wrap input::placeholder{color:rgba(255,255,255,.45)}
        .search-wrap input:focus{background:rgba(255,255,255,.18);box-shadow:0 0 0 3px rgba(99,102,241,.35)}
        .filter-wrap{display:flex;gap:8px;flex-wrap:wrap;justify-content:center;animation:fadeUp .6s ease-out .3s both}
        .filter-btn{padding:7px 18px;border-radius:24px;border:1.5px solid rgba(255,255,255,.2);background:rgba(255,255,255,.06);color:#fff;font-size:12.5px;cursor:pointer;transition:all .25s ease;font-weight:500;backdrop-filter:blur(4px)}
        .filter-btn:hover{background:rgba(99,102,241,.35);border-color:#6366f1}
        .filter-btn.active{background:#6366f1;border-color:#6366f1;box-shadow:0 4px 14px rgba(99,102,241,.35)}
        @keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        .content{padding:2rem 2rem 3rem;max-width:1060px;margin:0 auto}
        .stats{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:2rem}
        .stat-card{background:#fff;border-radius:16px;padding:1.25rem 1.5rem;border:1px solid rgba(226,232,240,.6);text-align:center;transition:all .3s ease;position:relative;overflow:hidden}
        .stat-card::after{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,#6366f1,#a855f7);border-radius:16px 16px 0 0;opacity:0;transition:opacity .3s ease}
        .stat-card:hover::after{opacity:1}
        .stat-card:hover{transform:translateY(-4px);box-shadow:0 12px 30px rgba(0,0,0,.07);border-color:#e2e8f0}
        .stat-card .num{font-size:30px;font-weight:800;color:#0f172a;background:linear-gradient(135deg,#6366f1,#a855f7);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .stat-card .lbl{font-size:12px;color:#64748b;font-weight:500;margin-top:3px;text-transform:uppercase;letter-spacing:.5px}
        .section-title{font-size:14px;font-weight:600;color:#64748b;margin-bottom:1.125rem;display:flex;align-items:center;gap:8px}
        .section-title::after{content:'';flex:1;height:1px;background:linear-gradient(90deg,#e2e8f0,transparent)}
        .card-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(270px,1fr));gap:18px}
        .ekskul-card{background:#fff;border-radius:16px;border:1px solid #e2e8f0;overflow:hidden;transition:all .35s cubic-bezier(.4,0,.2,1);cursor:pointer;display:flex;flex-direction:column;position:relative;animation:fadeUp .5s ease-out both}
        .ekskul-card:nth-child(1){animation-delay:.05s}
        .ekskul-card:nth-child(2){animation-delay:.1s}
        .ekskul-card:nth-child(3){animation-delay:.15s}
        .ekskul-card:nth-child(4){animation-delay:.2s}
        .ekskul-card:nth-child(5){animation-delay:.25s}
        .ekskul-card:nth-child(6){animation-delay:.3s}
        .ekskul-card:hover{transform:translateY(-6px);box-shadow:0 16px 40px rgba(0,0,0,.1);border-color:#cbd5e1}
        .card-img{width:100%;height:190px;object-fit:contain;display:block;transition:transform .5s ease;background:#0b1d3a;padding:12px}
        .ekskul-card:hover .card-img{transform:scale(1.05)}
        .card-img-placeholder{width:100%;height:190px;background:linear-gradient(135deg,#1e1b4b,#4338ca);display:flex;align-items:center;justify-content:center;color:#fff;font-size:44px}
        .card-accent{height:4px;background:#94a3b8;transition:height .25s ease}
        .ekskul-card:hover .card-accent{height:5px}
        .hari-senin .card-accent{background:linear-gradient(90deg,#3b82f6,#60a5fa)}
        .hari-selasa .card-accent{background:linear-gradient(90deg,#8b5cf6,#a78bfa)}
        .hari-rabu .card-accent{background:linear-gradient(90deg,#ec4899,#f472b6)}
        .hari-kamis .card-accent{background:linear-gradient(90deg,#f59e0b,#fbbf24)}
        .hari-jumat .card-accent{background:linear-gradient(90deg,#10b981,#34d399)}
        .hari-sabtu .card-accent{background:linear-gradient(90deg,#ef4444,#f87171)}
        .card-body{padding:1rem 1.25rem 1.25rem;flex:1;display:flex;flex-direction:column}
        .card-title{font-size:16px;font-weight:700;color:#0f172a;margin-bottom:10px}
        .card-info{display:flex;flex-direction:column;gap:7px;margin-bottom:12px;flex:1}
        .info-row{display:flex;align-items:center;gap:8px;font-size:13px;color:#475569}
        .info-row i{font-size:15px;color:#6366f1;flex-shrink:0}
        .badge-hari{display:inline-flex;align-items:center;gap:5px;font-size:11px;padding:4px 12px;border-radius:20px;font-weight:600;background:#eef2ff;color:#4338ca}
        .empty-state{text-align:center;padding:5rem 1rem;color:#94a3b8}
        .empty-state i{font-size:56px;margin-bottom:1rem;display:block;opacity:.5}
        .empty-state p{font-size:15px}
        footer{background:#0b1120;color:#64748b;text-align:center;padding:1.5rem;font-size:13px;border-top:1px solid rgba(255,255,255,.05)}
        footer strong{color:#a855f7;font-weight:700}
        .modal-overlay{display:none;position:fixed;inset:0;background:rgba(15,23,42,.7);backdrop-filter:blur(8px);z-index:999;align-items:center;justify-content:center;animation:fadeIn .25s ease}
        .modal-overlay.show{display:flex}
        @keyframes fadeIn{from{opacity:0}to{opacity:1}}
        .modal-box{background:#fff;border-radius:20px;padding:2rem;width:380px;max-width:92%;animation:modalPop .3s cubic-bezier(.34,1.56,.64,1);box-shadow:0 24px 60px rgba(0,0,0,.2)}
        @keyframes modalPop{from{opacity:0;transform:scale(.92) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
        .modal-img{width:100%;height:220px;object-fit:contain;border-radius:12px;margin-bottom:1.25rem;display:none;background:#0b1d3a;padding:16px}
        .modal-title{font-size:20px;font-weight:800;color:#0f172a;margin-bottom:1.25rem;padding-bottom:.75rem;border-bottom:2px solid #f1f5f9}
        .modal-row{display:flex;align-items:flex-start;gap:14px;padding:12px 0;border-bottom:1px solid #f1f5f9}
        .modal-row:last-of-type{border-bottom:none}
        .modal-row i{font-size:18px;color:#6366f1;margin-top:2px;flex-shrink:0;width:22px;text-align:center}
        .modal-row .mlbl{font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.5px}
        .modal-row .mval{font-size:14px;color:#0f172a;font-weight:600;margin-top:3px}
        .btn-tutup{margin-top:1.5rem;width:100%;padding:12px;background:linear-gradient(135deg,#6366f1,#a855f7);color:#fff;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px;transition:all .3s ease;box-shadow:0 4px 14px rgba(99,102,241,.3)}
        .btn-tutup:hover{background:linear-gradient(135deg,#4f46e5,#7c3aed);transform:translateY(-2px);box-shadow:0 6px 20px rgba(99,102,241,.4)}
        html.dark body{background:#0b1120;color:#e2e8f0}
        html.dark .navbar{background:rgba(7,13,26,.95)}
        html.dark .stat-card,html.dark .ekskul-card{background:#1e293b;border-color:#334155}
        html.dark .stat-card:hover{border-color:#475569}
        html.dark .stat-card .lbl{color:#64748b}
        html.dark .section-title{color:#64748b}
        html.dark .section-title::after{background:linear-gradient(90deg,#334155,transparent)}
        html.dark .card-title,html.dark .stat-card .num,html.dark .modal-title,html.dark .mval{color:#f1f5f9}
        html.dark .info-row{color:#94a3b8}
        html.dark .card-body .info-row i{color:#818cf8}
        html.dark .ekskul-card:hover{box-shadow:0 16px 40px rgba(0,0,0,.3);border-color:#475569}
        html.dark .empty-state i{opacity:.2}
        html.dark .modal-box{background:#1e293b}
        html.dark .modal-title{border-bottom-color:#334155}
        html.dark .modal-row{border-bottom-color:#1e293b}
        html.dark .modal-row i{color:#818cf8}
        html.dark .modal-row .mlbl{color:#64748b}
        html.dark .badge-hari{background:rgba(99,102,241,.15);color:#a5b4fc}
        html.dark #darkToggleHome{background:rgba(255,255,255,.08)}
        @media(max-width:640px){.navbar{padding:0 1rem}.hero{padding:2.5rem 1rem 3rem}.content{padding:1.25rem 1rem 2rem}.stats{grid-template-columns:1fr;gap:12px}.card-grid{grid-template-columns:1fr}.search-wrap input{width:100%}.stat-card .num{font-size:24px}}
    </style>
</head>
<body>

<nav class="navbar">
    <a href="<?php echo e(route('home')); ?>" class="nav-logo">
        <i class="ti ti-layout-grid"></i>
        <span>Ekskul</span>Manager
    </a>
    <div style="display:flex;align-items:center;gap:10px;">
        <button onclick="toggleDark()" id="darkToggleHome" style="width:36px;height:36px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:10px;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;transition:all .25s;" onmouseover="this.style.background='rgba(255,255,255,.2)'" onmouseout="this.style.background='rgba(255,255,255,.1)'">
            <i class="ti ti-moon" id="darkIconHome"></i>
        </button>
        <a href="<?php echo e(route('login')); ?>" class="btn-admin">
            <i class="ti ti-lock"></i> Admin Panel
        </a>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <h1>Daftar Kegiatan Ekstrakurikuler</h1>
        <p>Temukan kegiatan yang sesuai minat dan bakatmu</p>
        <div class="search-wrap">
            <input type="text" id="searchInput" placeholder="Cari nama kegiatan..." oninput="filterCards()">
        </div>
        <div class="filter-wrap">
            <button class="filter-btn active" onclick="setFilter('semua', this)">Semua</button>
            <button class="filter-btn" onclick="setFilter('senin', this)">Senin</button>
            <button class="filter-btn" onclick="setFilter('selasa', this)">Selasa</button>
            <button class="filter-btn" onclick="setFilter('rabu', this)">Rabu</button>
            <button class="filter-btn" onclick="setFilter('kamis', this)">Kamis</button>
            <button class="filter-btn" onclick="setFilter('jumat', this)">Jumat</button>
            <button class="filter-btn" onclick="setFilter('sabtu', this)">Sabtu</button>
        </div>
    </div>
</section>

<main class="content">
    <div class="stats">
        <div class="stat-card">
            <div class="num"><?php echo e($total); ?></div>
            <div class="lbl">Total Kegiatan</div>
        </div>
        <div class="stat-card">
            <div class="num"><?php echo e($hariList); ?></div>
            <div class="lbl">Hari Aktif</div>
        </div>
        <div class="stat-card">
            <div class="num"><?php echo e($kegiatans->pluck('pembina')->unique()->count()); ?></div>
            <div class="lbl">Pembina</div>
        </div>
    </div>

    <div class="section-title"><?php echo e($total); ?> kegiatan tersedia</div>

    <?php if($kegiatans->count() > 0): ?>
    <div class="card-grid" id="cardGrid">
        <?php $__currentLoopData = $kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $hariClass = 'hari-' . strtolower(str_replace(' ', '', $kegiatan->hari)); ?>
        <div class="ekskul-card <?php echo e($hariClass); ?>"
             data-nama="<?php echo e(strtolower($kegiatan->nama_kegiatan)); ?>"
             data-hari="<?php echo e(strtolower($kegiatan->hari)); ?>"
             onclick="openModal(
                 '<?php echo e(addslashes($kegiatan->nama_kegiatan)); ?>',
                 '<?php echo e(addslashes($kegiatan->hari)); ?>',
                 '<?php echo e(addslashes($kegiatan->waktu)); ?>',
                 '<?php echo e(addslashes($kegiatan->pembina)); ?>',
                 '<?php echo e($kegiatan->gambar ? asset($kegiatan->gambar) : ''); ?>'
             )">
            <?php if($kegiatan->gambar): ?>
                <img src="<?php echo e(asset($kegiatan->gambar)); ?>"
                     alt="<?php echo e($kegiatan->nama_kegiatan); ?>"
                     class="card-img" loading="lazy">
            <?php else: ?>
                <div class="card-img-placeholder">
                    <i class="ti ti-run"></i>
                </div>
            <?php endif; ?>
            <div class="card-accent"></div>
            <div class="card-body">
                <div class="card-title"><?php echo e($kegiatan->nama_kegiatan); ?></div>
                <div class="card-info">
                    <div class="info-row">
                        <i class="ti ti-calendar-week"></i>
                        <span class="badge-hari"><?php echo e(ucfirst($kegiatan->hari)); ?></span>
                    </div>
                    <div class="info-row">
                        <i class="ti ti-clock"></i>
                        <?php echo e($kegiatan->waktu); ?>

                    </div>
                    <div class="info-row">
                        <i class="ti ti-user-check"></i>
                        <?php echo e($kegiatan->pembina); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="empty-state">
        <i class="ti ti-calendar-x"></i>
        <p>Belum ada kegiatan terdaftar</p>
    </div>
    <?php endif; ?>
</main>

<footer>
    <strong>EkskulManager</strong> &mdash; Sistem Manajemen Kegiatan Ekstrakurikuler &copy; <?php echo e(date('Y')); ?>

</footer>

<div class="modal-overlay" id="modal" onclick="closeModal()">
    <div class="modal-box" onclick="event.stopPropagation()">
        <img id="m-gambar" src="" alt="" class="modal-img">
        <div class="modal-title" id="m-nama"></div>
        <div class="modal-row">
            <i class="ti ti-calendar-week"></i>
            <div>
                <div class="mlbl">Hari</div>
                <div class="mval" id="m-hari"></div>
            </div>
        </div>
        <div class="modal-row">
            <i class="ti ti-clock"></i>
            <div>
                <div class="mlbl">Waktu</div>
                <div class="mval" id="m-waktu"></div>
            </div>
        </div>
        <div class="modal-row">
            <i class="ti ti-user-check"></i>
            <div>
                <div class="mlbl">Pembina</div>
                <div class="mval" id="m-pembina"></div>
            </div>
        </div>
        <button class="btn-tutup" onclick="closeModal()">Tutup</button>
    </div>
</div>

<script>
    let activeFilter = 'semua';
    function setFilter(hari, btn) {
        activeFilter = hari;
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        filterCards();
    }
    function filterCards() {
        const keyword = document.getElementById('searchInput').value.toLowerCase();
        document.querySelectorAll('.ekskul-card').forEach(card => {
            const nama = card.dataset.nama;
            const hari = card.dataset.hari;
            const matchSearch = nama.includes(keyword);
            const matchFilter = activeFilter === 'semua' || hari === activeFilter;
            card.style.display = (matchSearch && matchFilter) ? 'flex' : 'none';
        });
    }
    function openModal(nama, hari, waktu, pembina, gambar) {
        document.getElementById('m-nama').textContent = nama;
        document.getElementById('m-hari').textContent = hari;
        document.getElementById('m-waktu').textContent = waktu;
        document.getElementById('m-pembina').textContent = pembina;
        const imgEl = document.getElementById('m-gambar');
        if (gambar) {
            imgEl.src = gambar;
            imgEl.style.display = 'block';
        } else {
            imgEl.style.display = 'none';
        }
        document.getElementById('modal').classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        document.getElementById('modal').classList.remove('show');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
    function toggleDark() {
        const h=document.documentElement;const i=document.getElementById('darkIconHome');
        h.classList.toggle('dark');const isDark=h.classList.contains('dark');
        localStorage.setItem('darkmode',isDark);
        i.className=isDark?'ti ti-sun':'ti ti-moon';
    }
    !function(){if(localStorage.getItem('darkmode')==='true')document.getElementById('darkIconHome').className='ti ti-sun'}();
</script>

</body>
</html>
<?php /**PATH C:\laragon\www\crud_uas_241011750222\resources\views/home.blade.php ENDPATH**/ ?>