<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Dosen') }}
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

            {{-- Form Tambah Dosen --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">Tambah Dosen</h3>

                    <form method="POST" action="{{ route('dosen.store') }}">
                        @csrf
                        <input type="text" name="nid" placeholder="NID Dosen"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;" required>

                        <input type="text" name="nama" placeholder="Nama Dosen"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;" required>

                        <input type="text" name="alamat" placeholder="Alamat"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;" required>

                        <input type="text" name="matakuliah" placeholder="Mata Kuliah"
                            class="border-gray-300 rounded-md w-full mb-3 p-2"
                            style="color: black;" required>

                        <button type="submit"
                                class="px-4 py-2 rounded"
                                style="background-color: #87898bff !important; color: white !important;">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>

            {{-- List Dosen --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">List Dosen</h3>

                    <table class="table-auto w-full border border-gray-300">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">NID</th>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Alamat</th>
                                <th class="px-4 py-2 border">Mata Kuliah</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $dosen)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $dosen->nid }}</td>
                                    <td class="border px-4 py-2">{{ $dosen->nama }}</td>
                                    <td class="border px-4 py-2">{{ $dosen->alamat }}</td>
                                    <td class="border px-4 py-2">{{ $dosen->matakuliah }}</td>
                                    <td class="border px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('dosen.edit', $dosen->id) }}"
                                        class="inline-block px-3 py-1 rounded"
                                        style="background-color: #0b69f5ff !important; color: white !important;">
                                            Edit
                                        </a>
                                        <form action="{{ route('dosen.destroy', $dosen->id) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Hapus data dosen ini?')"
                                                    class="px-3 py-1 rounded"
                                                    style="background-color: #dc2626 !important; color: white !important;">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center border px-4 py-2">
                                        Belum ada data dosen.
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
