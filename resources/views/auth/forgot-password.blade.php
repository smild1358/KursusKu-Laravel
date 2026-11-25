<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemulihan Password — KursusKu Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        brand: { 50: '#f0fdfa', 100: '#ccfbf1', 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e', 800: '#115e59', 900: '#134e4a' }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-teal-50/30 to-slate-100 text-slate-800 antialiased flex items-center justify-center p-4 font-sans">

    <div class="w-full max-w-md bg-white/95 backdrop-blur-xl border border-teal-100 rounded-3xl shadow-xl p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 text-white flex items-center justify-center shadow-md">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-brand-600">Account Recovery</span>
                    <h1 class="text-xl font-extrabold text-slate-900">Reset Password</h1>
                </div>
            </div>
            <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-bold text-slate-600 transition">
                <i class="fa-solid fa-arrow-left mr-1"></i> Login
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <div>&bull; {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset.custom') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Terdaftar</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                    placeholder="admin@kursusku.test">
            </div>

            <div>
                <label for="username" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Username Akun</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                    placeholder="admin">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Password Baru</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                    placeholder="Min. 8 karakter (huruf besar, kecil, angka, simbol)">
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-600"
                    placeholder="Ulangi password baru">
            </div>

            <button type="submit" class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-800 hover:to-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-700/20 transition">
                <i class="fa-solid fa-rotate mr-1.5"></i> Perbarui Password
            </button>
        </form>
    </div>
</body>
</html>