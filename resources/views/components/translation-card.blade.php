@props(['translation'])

<div class="group bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-xl hover:border-indigo-100 transition-all duration-300 relative overflow-hidden">
    <!-- Accent Line -->
    <div class="absolute top-0 left-0 w-2 h-full bg-indigo-500 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
    
    <div class="flex justify-between items-start mb-4">
        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">
            {{ $translation->created_at->diffForHumans() }}
        </span>
        <div class="flex gap-2">
            <!-- Edit Action -->
            <button onclick="openEditModal('{{ $translation->id }}', '{{ addslashes($translation->banglish_text) }}', '{{ addslashes($translation->bangla_text) }}')" 
                    class="p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </button>
            <!-- Delete Action -->
            <button onclick="openDeleteModal('{{ $translation->id }}')" class="p-2 text-slate-400 hover:text-rose-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="space-y-4">
        <div>
            <p class="text-xs font-medium text-slate-400 mb-1">Banglish</p>
            <p class="text-slate-700 leading-relaxed italic line-clamp-2">"{{ $translation->banglish_text }}"</p>
        </div>
        <div class="pt-4 border-t border-slate-50">
            <p class="text-xs font-medium text-indigo-400 mb-1">Bangla</p>
            <p class="text-xl font-bold text-slate-900 leading-relaxed">
                {{ $translation->bangla_text }}
            </p>
        </div>
    </div>
</div>
