<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Matakuliah') }}
        </h2>
    </x-slot>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Form Tambah Matakuliah --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">Tambah Matakuliah</h3>

                    <form method="POST" action="{{ route('matakuliah.store') }}">
                        @csrf
                        <input type="text"name="nama_matkul" placeholder="Nama Matakuliah"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;"required>

                        <input type="text"name="kode" placeholder="Kode Matakuliah"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;"required>

                        <input type="number"name="sks" placeholder="Jumlah SKS"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;"required>

                        <input type="text"name="deskripsi" placeholder="Deskripsi"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;"required>

                        <button
                            type="submit" class="px-4 py-2 rounded"
                            style="background-color: #87898bff !important; color: white !important;">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>

            {{-- List Matakuliah --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">List Matakuliah</h3>

                    <table class="table-auto w-full border border-gray-300">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Matakuliah</th>
                                <th class="px-4 py-2 border">Kode</th>
                                <th class="px-4 py-2 border">SKS</th>
                                <th class="px-4 py-2 border">Deskripsi</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $matkul)
                                <tr class="bg-white text-black dark:bg-gray-800 dark:text-white">
                                    <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $matkul->nama_matkul }}</td>
                                    <td class="border px-4 py-2">{{ $matkul->kode }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $matkul->sks }}</td>
                                    <td class="border px-4 py-2">{{ $matkul->deskripsi }}</td>
                                    <td class="border px-4 py-2 text-center space-x-2">
                                        <a
                                            href="{{ route('matakuliah.edit', $matkul->id) }}"
                                            class="inline-block px-3 py-1 rounded"
                                            style="background-color: #0b69f5ff !important; color: white !important;">
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('matakuliah.destroy', $matkul->id) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit" onclick="return confirm('Hapus data matkul ini?')"
                                                class="px-3 py-1 rounded"
                                                style="background-color: #dc2626 !important; color: white !important;">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border px-4 py-2 text-center text-white-500">
                                        Belum ada data matakuliah.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
