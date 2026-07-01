<!DOCTYPE html>
<html lang="id">
<head>
    <script>const d=localStorage.getItem('darkmode');if(d==='true')document.documentElement.classList.add('dark');</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Ekskul Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        *{font-family:'Inter',sans-serif;box-sizing:border-box}
        body{background:#f8fafc;margin:0;padding:0}
        .sidebar-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:999}
        .sidebar{width:260px;min-width:260px;min-height:100vh;background:#0b1120;display:flex;flex-direction:column;position:fixed;top:0;left:0;height:100vh;z-index:1001;transition:transform .3s cubic-bezier(.4,0,.2,1)}
        .sidebar-brand{padding:24px 20px;border-bottom:1px solid rgba(255,255,255,.06)}
        .brand-icon{width:42px;height:42px;background:linear-gradient(135deg,#6366f1,#a855f7);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px;color:white;margin-bottom:10px;transition:transform .3s ease}
        .brand-icon:hover{transform:rotate(-5deg) scale(1.05)}
        .sidebar-brand h6{color:#fff;font-weight:700;font-size:15px;margin:0;letter-spacing:-.3px}
        .sidebar-brand small{color:#475569;font-size:11px;font-weight:500}
        .sidebar-nav{padding:16px 12px;flex-grow:1;overflow-y:auto}
        .nav-label{color:#475569;font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;padding:10px 10px 6px;margin-top:6px}
        .sidebar-nav .nav-link{color:#94a3b8;padding:10px 12px;border-radius:10px;font-size:13.5px;font-weight:500;display:flex;align-items:center;gap:10px;transition:all .2s ease;margin-bottom:3px;text-decoration:none;position:relative}
        .sidebar-nav .nav-link i{width:18px;text-align:center;font-size:14px}
        .sidebar-nav .nav-link:hover{color:#fff;background:rgba(255,255,255,.06)}
        .sidebar-nav .nav-link.active{color:#fff;background:linear-gradient(135deg,rgba(99,102,241,.25),rgba(168,85,247,.15));box-shadow:inset 3px 0 0 #6366f1}
        .sidebar-nav .nav-link.active::after{content:'';position:absolute;right:10px;top:50%;transform:translateY(-50%);width:6px;height:6px;background:#6366f1;border-radius:50%}
        .sidebar-footer{padding:16px 12px;border-top:1px solid rgba(255,255,255,.06)}
        .user-card{background:rgba(255,255,255,.04);border-radius:12px;padding:12px 14px;display:flex;align-items:center;gap:10px;border:1px solid rgba(255,255,255,.04)}
        .user-avatar{width:36px;height:36px;background:linear-gradient(135deg,#6366f1,#a855f7);border-radius:10px;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:14px;flex-shrink:0}
        .user-info{flex-grow:1;min-width:0}
        .user-info .name{color:#fff;font-size:13px;font-weight:600}
        .user-info .role{color:#475569;font-size:11px}
        .btn-logout{width:30px;height:30px;background:rgba(255,255,255,.06);border:none;border-radius:8px;color:#94a3b8;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s ease;flex-shrink:0}
        .btn-logout:hover{background:#ef4444;color:white;transform:scale(1.05)}
        .main-content{margin-left:260px;min-height:100vh;transition:margin .3s cubic-bezier(.4,0,.2,1)}
        .topbar{background:rgba(255,255,255,.85);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid #e2e8f0;padding:14px 24px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100;gap:12px}
        .topbar-left{display:flex;align-items:center;gap:12px}
        .menu-toggle{display:none;width:36px;height:36px;background:#f1f5f9;border:1px solid #e2e8f0;border-radius:10px;align-items:center;justify-content:center;cursor:pointer;color:#475569;font-size:16px;transition:all .2s}
        .menu-toggle:hover{background:#e2e8f0}
        .topbar h5{font-weight:700;color:#0f172a;margin:0;font-size:17px;letter-spacing:-.3px}
        .page-content{padding:28px}
        .card{border:none!important;border-radius:16px!important;box-shadow:0 1px 3px rgba(0,0,0,.04),0 4px 20px rgba(0,0,0,.04)!important;overflow:hidden}
        .card-header-custom{padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px}
        .card-header-custom h6{font-weight:700;color:#0f172a;margin:0;font-size:15px;display:flex;align-items:center;gap:8px}
        .btn-primary{background:linear-gradient(135deg,#6366f1,#a855f7)!important;border:none!important;font-weight:600!important;padding:9px 20px!important;border-radius:10px!important;font-size:13px!important;box-shadow:0 4px 12px rgba(99,102,241,.3)!important;transition:all .3s ease!important}
        .btn-primary:hover{transform:translateY(-2px)!important;box-shadow:0 6px 20px rgba(99,102,241,.4)!important}
        .btn-danger{background:linear-gradient(135deg,#ef4444,#dc2626)!important;border:none!important;font-weight:600!important;padding:9px 20px!important;border-radius:10px!important;font-size:13px!important;transition:all .3s ease!important}
        .btn-danger:hover{transform:translateY(-2px)!important}
        .btn-warning{background:linear-gradient(135deg,#f59e0b,#d97706)!important;border:none!important;color:white!important;font-weight:600!important;border-radius:8px!important;font-size:12px!important;transition:all .2s!important;padding:6px 14px!important}
        .btn-warning:hover{transform:translateY(-1px)!important;box-shadow:0 4px 12px rgba(245,158,11,.3)!important}
        .btn-secondary-custom{background:#f1f5f9;color:#475569;border:1px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;padding:8px 18px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:all .2s}
        .btn-secondary-custom:hover{background:#e2e8f0;color:#1e293b}
        .alert{border:none!important;border-radius:12px!important;font-size:13.5px;padding:14px 18px!important;display:flex!important;align-items:center!important;gap:10px!important}
        .alert-success{background:#eef2ff;color:#4338ca;border:1px solid #c7d2fe!important}
        .alert-danger{background:#fef2f2;color:#991b1b;border:1px solid #fecaca!important}
        .table thead th{background:#f8fafc;color:#475569;font-weight:600;font-size:11px;text-transform:uppercase;letter-spacing:.6px;border-bottom:2px solid #e2e8f0;padding:14px 16px}
        .table tbody td{padding:14px 16px;color:#334155;vertical-align:middle;font-size:13.5px;border-bottom:1px solid #f1f5f9}
        .table tbody tr{transition:background .15s ease}
        .table tbody tr:hover{background:#f8fafc}
        .table tbody tr:last-child td{border-bottom:none}
        .form-label{font-size:13px;font-weight:600;color:#374151;margin-bottom:6px}
        .form-control,.form-select{border:2px solid #e2e8f0;border-radius:11px;font-size:13.5px;padding:10px 14px;color:#1e293b;transition:all .2s;background:#fafbfc}
        .form-control:focus,.form-select:focus{border-color:#6366f1;box-shadow:0 0 0 4px rgba(99,102,241,.1);background:#fff}
        .form-control.is-invalid,.form-select.is-invalid{border-color:#ef4444;background:#fff}
        .invalid-feedback{font-size:11.5px;display:flex;align-items:center;gap:4px;margin-top:4px}
        .btn-darkmode{width:30px;height:30px;background:rgba(255,255,255,.06);border:none;border-radius:8px;color:#94a3b8;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s ease;flex-shrink:0;font-size:13px;margin-left:4px}
        .btn-darkmode:hover{background:rgba(99,102,241,.25);color:#6366f1;transform:scale(1.05)}
        html.dark body{background:#0b1120}
        html.dark .topbar{background:rgba(11,17,32,.92);border-bottom-color:#1e293b}
        html.dark .topbar h5{color:#e2e8f0}
        html.dark .menu-toggle{background:#1e293b;border-color:#334155;color:#94a3b8}
        html.dark .menu-toggle:hover{background:#334155}
        html.dark .card{background:#1e293b!important;box-shadow:0 1px 3px rgba(0,0,0,.2),0 4px 20px rgba(0,0,0,.2)!important}
        html.dark .card-header-custom{border-bottom-color:#334155}
        html.dark .card-header-custom h6{color:#e2e8f0}
        html.dark .table thead th{background:#1e293b;color:#94a3b8;border-bottom-color:#334155}
        html.dark .table tbody td{color:#cbd5e1;border-bottom-color:#1e293b}
        html.dark .table tbody tr:hover{background:rgba(255,255,255,.03)}
        html.dark .form-label{color:#94a3b8}
        html.dark .form-control,html.dark .form-select{background:#0f172a;border-color:#334155;color:#e2e8f0}
        html.dark .form-control:focus,html.dark .form-select:focus{background:#0f172a;border-color:#6366f1}
        html.dark .form-control.is-invalid,html.dark .form-select.is-invalid{border-color:#ef4444;background:#0f172a}
        html.dark .btn-secondary-custom{background:#1e293b;border-color:#334155;color:#94a3b8}
        html.dark .btn-secondary-custom:hover{background:#334155;color:#e2e8f0}
        html.dark .page-content .alert-success{background:rgba(99,102,241,.12);color:#a5b4fc;border-color:rgba(99,102,241,.25)!important}
        html.dark .page-content .alert-danger{background:rgba(239,68,68,.12);color:#fca5a5;border-color:rgba(239,68,68,.25)!important}
        html.dark .page-content .alert .btn-close{filter:invert(.8)}
        html.dark .dataTables_wrapper .dataTables_length,html.dark .dataTables_wrapper .dataTables_filter,html.dark .dataTables_wrapper .dataTables_info,html.dark .dataTables_wrapper .dataTables_paginate{color:#94a3b8!important}
        html.dark .dataTables_wrapper .dataTables_filter input{background:#0f172a;border-color:#334155;color:#e2e8f0}
        html.dark .dataTables_wrapper .dataTables_length select{background:#0f172a;border-color:#334155;color:#e2e8f0}
        html.dark .dataTables_wrapper .dataTables_paginate .paginate_button{color:#94a3b8!important}
        html.dark .dataTables_wrapper .dataTables_paginate .paginate_button.current{background:#6366f1!important;border-color:#6366f1!important;color:#fff!important}
        html.dark .dataTables_wrapper .dataTables_paginate .paginate_button:hover{background:rgba(99,102,241,.2)!important;border-color:transparent!important}
        @media(max-width:768px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .sidebar-overlay.show{display:block}
            .main-content{margin-left:0}
            .menu-toggle{display:flex}
            .page-content{padding:20px 16px}
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="fas fa-school"></i></div>
        <h6>Ekskul Manager</h6>
        <small>Manajemen Kegiatan</small>
    </div>
    <div class="sidebar-nav">
        <div class="nav-label">Menu</div>
        <a href="{{ route('kegiatan.index') }}" class="nav-link {{ request()->routeIs('kegiatan.index') ? 'active' : '' }}">
            <i class="fas fa-calendar-check"></i> Data Kegiatan
        </a>
        <a href="{{ route('kegiatan.create') }}" class="nav-link {{ request()->routeIs('kegiatan.create') ? 'active' : '' }}">
            <i class="fas fa-plus-circle"></i> Tambah Kegiatan
        </a>
        <div class="nav-label" style="margin-top:16px;">Lainnya</div>
        <a href="{{ route('home') }}" class="nav-link" target="_blank">
            <i class="fas fa-globe"></i> Halaman Publik
        </a>
        <a href="{{ route('kegiatan.pdf') }}" class="nav-link">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
    </div>
    <div class="sidebar-footer">
        <div class="user-card">
            <div class="user-avatar">{{ strtoupper(substr(session('username','A'),0,1)) }}</div>
            <div class="user-info">
                <div class="name">{{ session('username','Admin') }}</div>
                <div class="role">Administrator</div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout" title="Logout">
                    <i class="fas fa-sign-out-alt" style="font-size:12px;"></i>
                </button>
            </form>
        </div>
    </div>
    <div style="padding:8px 12px 4px;display:flex;align-items:center;gap:6px;">
        <button class="btn-darkmode" id="darkToggle" onclick="toggleDark()" title="Dark Mode">
            <i class="fas fa-moon" id="darkIcon"></i>
        </button>
    </div>
</div>
<div class="main-content" id="mainContent">
    <div class="topbar">
        <div class="topbar-left">
            <button class="menu-toggle" id="menuToggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h5>@yield('header','Dashboard')</h5>
        </div>
        <span class="badge px-3 py-2 rounded-pill" style="font-size:11px;font-weight:600;background:rgba(99,102,241,.1);color:#6366f1;">
            <i class="fas fa-circle me-1" style="font-size:6px;"></i> Online
        </span>
    </div>
    <div class="page-content">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    @if(session('success'))
        Swal.fire({toast:true, position:'top-end', icon:'success', title:@json(session('success')), showConfirmButton:false, timer:2800, timerProgressBar:true});
    @endif
    @if(session('error'))
        Swal.fire({toast:true, position:'top-end', icon:'error', title:@json(session('error')), showConfirmButton:false, timer:3200, timerProgressBar:true});
    @endif
</script>
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sidebarOverlay').classList.toggle('show');
    }
    function toggleDark() {
        const h=document.documentElement;const i=document.getElementById('darkIcon');
        h.classList.toggle('dark');const isDark=h.classList.contains('dark');
        localStorage.setItem('darkmode',isDark);
        i.className=isDark?'fas fa-sun':'fas fa-moon';
    }
    !function(){const d=localStorage.getItem('darkmode');if(d==='true'){document.getElementById('darkIcon').className='fas fa-sun'}}();
</script>
@stack('scripts')
</body>
</html>
