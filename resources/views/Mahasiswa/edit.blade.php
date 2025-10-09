<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                {{-- Notifikasi error --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-4">
                        <label class="block text-white">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $mhs->nama) }}"
                        class="border rounded w-full px-3 py-2 text-black" required>
                    </div>

                    {{-- NIM --}}
                    <div class="mb-4">
                        <label class="block text-white">NIM</label>
                        <input
                        type="text" name="nim" value="{{ old('nim', $mhs->nim) }}"
                        class="border rounded w-full px-3 py-2 text-black" required>
                    </div>

                    {{-- Jurusan --}}
                    <div class="mb-4">
                        <label class="block text-white">Jurusan</label>
                        <input
                        type="text" name="jurusan"value="{{ old('jurusan', $mhs->jurusan) }}"
                        class="border rounded w-full px-3 py-2 text-black" required>
                    </div>

                    {{-- Kelas --}}
                    <div class="mb-4">
                        <label class="block text-white">Kelas</label>
                        <select name="kelas_id"
                        class="border rounded w-full px-3 py-2 text-black" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}"
                                    {{ old('kelas_id', $mhs->kelas_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-between">
                        <a
                            href="{{ route('mahasiswa.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                            Cancel
                        </a>

                        <button
                            type="submit"class="px-4 py-2 rounded"
                            style="background-color: #87898bff !important; color: white !important;">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
