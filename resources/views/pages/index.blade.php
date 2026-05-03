<x-layout title="Banglish to Bangla Converter">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
                    Banglish Converter
                </h1>
            </div>
            <button onclick="toggleModal('createModal')" 
               class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-1">
                Create New Translation
            </button>
        </div>

        <!-- Flash Success Message -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Main Content: Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($translations as $data)
                <x-translation-card :translation="$data" />
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900">No translations found</h3>
                    <p class="text-slate-500 mt-1">Start by creating your first conversion.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Create Modal -->
    <x-modal id="createModal" title="New Translation">
        <form action="{{ route('translations.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Type in Banglish</label>
                <textarea id="create_banglish" name="banglish_text" rows="4" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all" placeholder="E.g., ami bhalo achi..."></textarea>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Bangla Output</label>
                <textarea id="create_bangla" name="bangla_text" rows="4" class="w-full px-5 py-4 bg-indigo-50/30 border border-indigo-100 rounded-2xl outline-none transition-all font-bold text-indigo-900"></textarea>
            </div>
            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg transition-all transform hover:-translate-y-1">Save Now</button>
        </form>
    </x-modal>

    <!-- Edit Modal -->
    <x-modal id="editModal" title="Edit Translation">
        <form id="editForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Type in Banglish</label>
                <textarea id="edit_banglish" name="banglish_text" rows="4" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all"></textarea>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Bangla Output</label>
                <textarea id="edit_bangla" name="bangla_text" rows="4" class="w-full px-5 py-4 bg-indigo-50/30 border border-indigo-100 rounded-2xl outline-none transition-all font-bold text-indigo-900"></textarea>
            </div>
            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg transition-all transform hover:-translate-y-1">Update Changes</button>
        </form>
    </x-modal>

    <!-- Delete Confirmation Modal -->
    <x-modal id="deleteModal" title="Are you sure?" maxWidth="md">
        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 bg-rose-50 rounded-full text-rose-600">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <p class="text-slate-500 text-center mb-8">This action cannot be undone. This translation will be permanently removed.</p>
        
        <form id="deleteForm" method="POST" class="flex flex-col sm:flex-row gap-4">
            @csrf
            @method('DELETE')
            <button type="button" onclick="toggleModal('deleteModal')" class="flex-1 py-3 px-6 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-2xl transition-all">Cancel</button>
            <button type="submit" class="flex-1 py-3 px-6 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-2xl shadow-lg shadow-rose-200 transition-all transform hover:-translate-y-1">Yes, Delete</button>
        </form>
    </x-modal>

    <!-- Global Scripts -->
    <script>
        // Modal Visibility Handler
        window.toggleModal = (modalId) => {
            document.getElementById(modalId).classList.toggle('hidden');
        };

        // Edit Modal Preparer
        window.openEditModal = (id, banglish, bangla) => {
            const form = document.getElementById('editForm');
            form.action = `/translation/${id}/update`;
            document.getElementById('edit_banglish').value = banglish;
            document.getElementById('edit_bangla').value = bangla;
            document.getElementById('editModal').classList.remove('hidden');
        };

        // Delete Modal Preparer
        window.openDeleteModal = (id) => {
            document.getElementById('deleteForm').action = `/translation/${id}/delete`;
            document.getElementById('deleteModal').classList.remove('hidden');
        };

        document.addEventListener('DOMContentLoaded', function() {
            // Avro Real-time Logic Factory
            const attachAvro = (inputId, outputId) => {
                const input = document.getElementById(inputId);
                const output = document.getElementById(outputId);
                input.addEventListener('input', () => {
                    if (window.Avro) output.value = window.Avro.parse(input.value);
                });
            };

            attachAvro('create_banglish', 'create_bangla');
            attachAvro('edit_banglish', 'edit_bangla');
        });
    </script>
</x-layout>
