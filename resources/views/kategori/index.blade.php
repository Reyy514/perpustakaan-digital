@extends('layouts.app')

@section('content')
<div x-data="kategoriComponent()" x-cloak>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">DAFTAR KATEGORI BUKU</h1>
    
    <div class="flex items-center gap-2">
        <!-- Form Search -->
        <form method="GET" action="{{ route('kategori.index') }}" class="flex">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari..."
                class="w-40 sm:w-48 rounded-l-md border border-gray-300 px-3 py-2 focus:ring-orange-500 focus:border-orange-500 text-sm">
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-3 py-2 rounded-r-md text-sm">
                Cari
            </button>
        </form>

        <!-- Tombol Tambah -->
        <button
            @click="openCreate = true"
            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg shadow text-sm transition">
            + Tambah
        </button>
    </div>
</div>


        @if (session('success'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($kategoris->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($kategoris as $kategori)
            <div class="bg-white dark:bg-dark-base-200 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 transition hover:shadow-lg hover:-translate-y-1">
                <div class="flex justify-between items-start mb-3">
                    <span class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $kategori->id }}</span>
                    <span class="bg-orange-100 text-orange-600 text-xs font-semibold px-2 py-1 rounded-full">Kategori</span>
                </div>

                <h2 class="text-xl font-semibold text-gray-800 dark:text-white group-hover:text-orange-500 transition">
                    {{ $kategori->nama }}
                </h2>

                <div class="mt-6 flex flex-col gap-2">
                    <a href="{{ route('kategori.buku', $kategori->id) }}"
                       class="text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                        Lihat Daftar Buku
                    </a>

                    <div class="flex gap-2">
                        <button
                            @click="openEditModal({ id: {{ $kategori->id }}, nama: '{{ $kategori->nama }}' })"
                            class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            Edit
                        </button>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-600 dark:text-gray-300 mt-12 text-lg">
            @if(request('search'))
                Tidak ditemukan kategori dengan nama <strong>"{{ request('search') }}"</strong>.
            @else
                Belum ada kategori.
            @endif
        </div>
        @endif
    </div>

    <!-- Modal Tambah -->
    <div
        x-show="openCreate"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center"
    >
        <div @click.away="openCreate = false" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-md w-full">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Tambah Kategori</h2>
            <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Kategori</label>
                    <input type="text" name="nama" required
                        class="mt-1 w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-orange-500 focus:border-orange-500">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="openCreate = false"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div
        x-show="openEdit"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center"
    >
        <div @click.away="openEdit = false" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-md w-full">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Edit Kategori</h2>
            <form :action="`/kategori/${selectedKategori.id}`" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Kategori</label>
                    <input type="text" name="nama" x-model="selectedKategori.nama" required
                        class="mt-1 w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="openEdit = false"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function kategoriComponent() {
        return {
            openCreate: false,
            openEdit: false,
            selectedKategori: {
                id: null,
                nama: '',
            },
            openEditModal(kategori) {
                this.selectedKategori = {...kategori};
                this.openEdit = true;
            }
        }
    }
</script>
@endpush
