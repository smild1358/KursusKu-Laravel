<div id="course-results" class="space-y-4">
    <!-- Info Ringkas Hasil Pencarian -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 px-1 text-xs text-slate-500">
        <div>
            Menampilkan <span class="font-bold text-slate-800">{{ $courses->firstItem() ?? 0 }}</span> – 
            <span class="font-bold text-slate-800">{{ $courses->lastItem() ?? 0 }}</span> dari 
            <span class="font-bold text-brand-700">{{ $courses->total() }}</span> program kursus
        </div>
        @if(request()->filled('q') || request()->filled('status'))
            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-brand-50 text-brand-700 border border-brand-200 font-semibold">
                <i class="fa-solid fa-filter text-[10px]"></i>
                <span>Filter aktif</span>
            </div>
        @endif
    </div>

    <!-- Tabel Data Course -->
    <div class="glass-card rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/90 text-slate-500 uppercase text-xs tracking-wider border-b border-slate-200">
                        <th class="py-4 px-6 font-bold">Kode</th>
                        <th class="py-4 px-6 font-bold">Nama Program Kursus</th>
                        <th class="py-4 px-6 font-bold">Biaya</th>
                        <th class="py-4 px-6 font-bold">Kuota</th>
                        <th class="py-4 px-6 font-bold">Mulai</th>
                        <th class="py-4 px-6 font-bold">Status</th>
                        <th class="py-4 px-6 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($courses as $course)
                        <tr class="hover:bg-teal-50/40 transition-colors">
                            <td class="py-4 px-6 font-mono font-bold text-xs text-brand-800">
                                <span class="px-2.5 py-1 rounded-lg bg-brand-50 border border-brand-200/80">
                                    {{ $course->code }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $course->name }}</div>
                                @if ($course->description)
                                    <div class="text-xs text-slate-400 line-clamp-1 max-w-xs">{{ $course->description }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-6 font-mono text-xs font-semibold text-slate-700">
                                Rp {{ number_format($course->fee, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 text-xs font-semibold text-slate-600">
                                {{ $course->quota }} peserta
                            </td>
                            <td class="py-4 px-6 font-mono text-xs text-slate-600">
                                {{ optional($course->start_date)->format('d/m/Y') ?? '-' }}
                            </td>
                            <td class="py-4 px-6">
                                @php
                                    $badgeStyle = match($course->status) {
                                        'open'   => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                        'closed' => 'bg-rose-50 text-rose-700 border-rose-200',
                                        'draft'  => 'bg-amber-50 text-amber-700 border-amber-200',
                                        default  => 'bg-slate-100 text-slate-700 border-slate-200',
                                    };
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border {{ $badgeStyle }}">
                                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('courses.show', $course) }}" class="px-2.5 py-1.5 rounded-lg bg-sky-50 hover:bg-sky-100 text-sky-700 border border-sky-200 text-xs font-bold transition" title="Detail">
                                        Detail
                                    </a>
                                    <a href="{{ route('courses.edit', $course) }}" class="px-2.5 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200 text-xs font-bold transition" title="Edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kursus {{ $course->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 text-xs font-bold transition" title="Hapus">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-16 text-center text-slate-400">
                                <div class="w-16 h-16 mx-auto bg-teal-50 text-brand-600 rounded-2xl flex items-center justify-center text-2xl mb-3 border border-teal-100">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <p class="font-bold text-slate-800 text-sm">Tidak ada kursus yang sesuai pencarian/filter.</p>
                                <p class="text-xs text-slate-400 mt-1">Coba kata kunci lain atau tekan tombol <strong>Reset</strong> untuk menampilkan semua kursus.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Navigasi Pagination (Mempertahankan q & status via withQueryString) -->
    @if ($courses->hasPages())
        <div class="pagination-wrapper pt-2">
            {{ $courses->links() }}
        </div>
    @endif
</div>