<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kursus - KursusKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] }, colors: { brand: { 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e' } } } }
        }
    </script>
    <style>
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        .glass-card { background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(16px); border: 1px solid rgba(20, 184, 166, 0.2); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-teal-50/20 to-slate-100 text-slate-800 antialiased min-h-screen flex flex-col justify-between font-sans">

    <header class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-brand-500 flex items-center justify-center text-white shadow-md">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-brand-900 to-brand-600 bg-clip-text text-transparent">KursusKu</span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Minggu 11 - Edit Modul</span>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-2xl mx-auto px-4 pt-32 pb-16 w-full">
        <div class="glass-card p-8 rounded-3xl shadow-xl bg-white border border-slate-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-extrabold text-slate-900">Edit Kursus</h1>
                <a href="{{ route('courses.show', $course->id) }}" class="text-xs font-semibold text-slate-500 hover:text-brand-700 transition">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Batal
                </a>
            </div>

            <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Kode Kursus</label>
                    <input type="text" name="code" value="{{ old('code', $course->code) }}" required class="w-full px-3 py-2 bg-white border @error('code') border-rose-500 bg-rose-50/30 @else border-slate-200 @enderror rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                    @error('code')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Kursus</label>
                    <input type="text" name="name" value="{{ old('name', $course->name) }}" required class="w-full px-3 py-2 bg-white border @error('name') border-rose-500 bg-rose-50/30 @else border-slate-200 @enderror rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                    @error('name')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-teal-500">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Biaya (Rp)</label>
                        <input type="number" name="fee" value="{{ old('fee', $course->fee) }}" min="0" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                        @error('fee')
                            <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Kuota Peserta</label>
                        <input type="number" name="quota" value="{{ old('quota', $course->quota) }}" min="1" max="500" required class="w-full px-3 py-2 bg-white border @error('quota') border-rose-500 bg-rose-50/30 @else border-slate-200 @enderror rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                        @error('quota')
                            <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ old('start_date', optional($course->start_date)->format('Y-m-d')) }}" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                        @error('start_date')
                            <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Status</label>
                        <select name="status" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                            <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="open" {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        @error('status')
                            <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-brand-700 text-white font-bold text-sm shadow-md hover:bg-brand-800 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-400 py-6 text-center text-xs border-t border-slate-800">
        <p>&copy; 2026 <strong>KursusKu</strong>. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>