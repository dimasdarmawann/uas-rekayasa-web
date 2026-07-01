<!DOCTYPE html>
<html lang="id">
<head>
    <script>const d=localStorage.getItem('darkmode');if(d==='true')document.documentElement.classList.add('dark');</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Ekskul Manager</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *{font-family:'Inter',sans-serif;box-sizing:border-box}
        body{margin:0;min-height:100vh;display:flex;background:#0f172a;overflow:hidden}
        .left-panel{flex:1;background:linear-gradient(145deg,#0b1120 0%,#1e1b4b 35%,#4338ca 70%,#6366f1 100%);display:flex;flex-direction:column;align-items:center;justify-content:center;padding:60px;position:relative;overflow:hidden}
        .left-panel .orb{position:absolute;border-radius:50%;pointer-events:none}
        .left-panel .orb:nth-child(1){width:500px;height:500px;background:radial-gradient(circle,rgba(99,102,241,.15),transparent 70%);top:-200px;right:-150px;animation:orbFloat 8s ease-in-out infinite alternate}
        .left-panel .orb:nth-child(2){width:400px;height:400px;background:radial-gradient(circle,rgba(168,85,247,.12),transparent 70%);bottom:-180px;left:-120px;animation:orbFloat 10s ease-in-out infinite alternate-reverse}
        .left-panel .orb:nth-child(3){width:200px;height:200px;background:radial-gradient(circle,rgba(139,92,246,.1),transparent 70%);top:30%;left:15%;animation:orbFloat 12s ease-in-out infinite alternate}
        @keyframes orbFloat{0%{transform:translate(0,0) scale(1)}100%{transform:translate(30px,-30px) scale(1.1)}}
        .left-content{position:relative;z-index:1;color:white;animation:fadeIn 1s ease-out}
        @keyframes fadeIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        .left-icon{width:72px;height:72px;background:rgba(255,255,255,.1);backdrop-filter:blur(12px);border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:30px;margin-bottom:28px;border:1px solid rgba(255,255,255,.15);transition:transform .3s ease}
        .left-icon:hover{transform:scale(1.05) rotate(-3deg)}
        .left-content h2{font-size:32px;font-weight:800;margin-bottom:10px;letter-spacing:-.5px}
        .left-content p{color:rgba(196,181,253,.7);font-size:14.5px;line-height:1.7;max-width:340px}
        .feature-item{display:flex;align-items:center;gap:12px;margin-bottom:14px;color:rgba(255,255,255,.75);font-size:13.5px;transition:transform .2s ease}
        .feature-item:hover{transform:translateX(4px)}
        .fi-icon{width:32px;height:32px;background:rgba(255,255,255,.08);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;border:1px solid rgba(255,255,255,.06)}
        .right-panel{width:460px;min-width:460px;background:#fff;display:flex;align-items:center;justify-content:center;padding:60px 48px;position:relative}
        .right-panel::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,#6366f1,#a855f7,#22d3ee)}
        .login-form{width:100%;animation:fadeIn 1s ease-out .2s both}
        .login-form h4{font-size:24px;font-weight:800;color:#0f172a;margin-bottom:4px;letter-spacing:-.3px}
        .login-form .subtitle{color:#64748b;font-size:14px;margin-bottom:32px}
        .input-group-custom{position:relative;margin-bottom:20px}
        .input-group-custom label{font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:6px}
        .input-group-custom .input-wrap{position:relative}
        .input-group-custom .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;z-index:2;pointer-events:none}
        .input-group-custom input{width:100%;padding:12px 14px 12px 44px;border:2px solid #e2e8f0;border-radius:12px;font-size:14px;color:#1e293b;transition:all .25s ease;outline:none;background:#fafbfc}
        .input-group-custom input:focus{border-color:#6366f1;box-shadow:0 0 0 4px rgba(99,102,241,.12);background:#fff}
        .input-group-custom input.is-invalid{border-color:#ef4444}
        .err{color:#ef4444;font-size:12px;margin-top:4px;display:flex;align-items:center;gap:5px}
        .alert-err{background:#fef2f2;color:#991b1b;border:1px solid #fecaca;border-radius:12px;padding:12px 16px;font-size:13px;font-weight:500;margin-bottom:20px;display:flex;align-items:center;gap:8px}
        .alert-succ{background:#f0fdf4;color:#065f46;border:1px solid #bbf7d0;border-radius:12px;padding:12px 16px;font-size:13px;font-weight:500;margin-bottom:20px;display:flex;align-items:center;gap:8px}
        .password-toggle{position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;cursor:pointer;font-size:14px;padding:4px;transition:color .2s}
        .password-toggle:hover{color:#6366f1}
        .btn-login{width:100%;padding:13px;background:linear-gradient(135deg,#6366f1,#8b5cf6);border:none;border-radius:12px;color:white;font-weight:700;font-size:15px;cursor:pointer;transition:all .3s ease;margin-top:8px;display:flex;align-items:center;justify-content:center;gap:8px;box-shadow:0 4px 16px rgba(99,102,241,.3)}
        .btn-login:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(99,102,241,.4)}
        .btn-login:active{transform:translateY(0)}
        .back-link{text-align:center;margin-top:20px;font-size:13px;color:#64748b}
        .back-link a{color:#6366f1;text-decoration:none;font-weight:600;transition:color .2s;display:inline-flex;align-items:center;gap:6px}
        .back-link a:hover{color:#4f46e5}
        .btn-darkmode-login{position:absolute;top:20px;right:20px;width:38px;height:38px;background:#f1f5f9;border:1px solid #e2e8f0;border-radius:10px;color:#475569;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:15px;transition:all .25s;z-index:5}
        .btn-darkmode-login:hover{background:#e2e8f0}
        html.dark .right-panel{background:#0f172a}
        html.dark .right-panel::before{background:linear-gradient(90deg,#6366f1,#a855f7)}
        html.dark .login-form h4{color:#f1f5f9}
        html.dark .login-form .subtitle{color:#64748b}
        html.dark .input-group-custom label{color:#94a3b8}
        html.dark .input-group-custom input{background:#1e293b;border-color:#334155;color:#e2e8f0}
        html.dark .input-group-custom input:focus{background:#1e293b;border-color:#6366f1}
        html.dark .input-group-custom .input-icon{color:#64748b}
        html.dark .password-toggle{color:#64748b}
        html.dark .btn-darkmode-login{background:#1e293b;border-color:#334155;color:#94a3b8}
        html.dark .btn-darkmode-login:hover{background:#334155}
        @media(max-width:900px){.left-panel{display:none}.right-panel{width:100%;min-width:unset;padding:40px 28px}}
    </style>
</head>
<body>
<div class="left-panel">
    <div class="orb"></div>
    <div class="orb"></div>
    <div class="orb"></div>
    <div class="left-content">
        <div class="left-icon"><i class="fas fa-school"></i></div>
        <h2>Ekskul Manager</h2>
        <p>Kelola seluruh data kegiatan ekstrakurikuler dengan mudah dan efisien.</p>
        <div style="margin-top:32px;">
            <div class="feature-item"><div class="fi-icon"><i class="fas fa-check"></i></div>Manajemen data kegiatan lengkap</div>
            <div class="feature-item"><div class="fi-icon"><i class="fas fa-file-pdf"></i></div>Export laporan PDF otomatis</div>
            <div class="feature-item"><div class="fi-icon"><i class="fas fa-lock"></i></div>Sistem login aman & terlindungi</div>
        </div>
    </div>
</div>
<div class="right-panel">
    <button class="btn-darkmode-login" onclick="toggleDark()" title="Dark Mode">
        <i class="fas fa-moon" id="darkIconLogin"></i>
    </button>
    <div class="login-form">
        <h4>Selamat Datang</h4>
        <p class="subtitle">Masuk ke panel admin Ekskul Manager</p>
        @if(session('error'))
            <div class="alert-err"><i class="fas fa-exclamation-circle"></i>{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert-succ"><i class="fas fa-check-circle"></i>{{ session('success') }}</div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="input-group-custom">
                <label for="username">Username</label>
                <div class="input-wrap">
                    <i class="fas fa-user input-icon"></i>
                    <input id="username" type="text" name="username" placeholder="Masukkan username" value="{{ old('username') }}" class="@error('username') is-invalid @enderror">
                    @error('username')<div class="err"><i class="fas fa-times-circle"></i>{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="input-group-custom">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <i class="fas fa-lock input-icon"></i>
                    <input id="password" type="password" name="password" placeholder="Masukkan password" class="@error('password') is-invalid @enderror">
                    <button type="button" class="password-toggle" onclick="togglePass()" tabindex="-1">
                        <i class="fas fa-eye" id="passIcon"></i>
                    </button>
                    @error('password')<div class="err"><i class="fas fa-times-circle"></i>{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i>Masuk ke Panel Admin</button>
        </form>
        <div class="back-link">
            <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i>Kembali ke halaman publik</a>
        </div>
    </div>
</div>
<script>
    function togglePass() {
        const p = document.getElementById('password');
        const i = document.getElementById('passIcon');
        if (p.type === 'password') {
            p.type = 'text';
            i.className = 'fas fa-eye-slash';
        } else {
            p.type = 'password';
            i.className = 'fas fa-eye';
        }
    }
    function toggleDark() {
        const h=document.documentElement;const i=document.getElementById('darkIconLogin');
        h.classList.toggle('dark');const isDark=h.classList.contains('dark');
        localStorage.setItem('darkmode',isDark);
        i.className=isDark?'fas fa-sun':'fas fa-moon';
    }
    !function(){if(localStorage.getItem('darkmode')==='true')document.getElementById('darkIconLogin').className='fas fa-sun'}();
</script>
</body>
</html>
