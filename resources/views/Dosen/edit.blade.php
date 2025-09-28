<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Dosen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-white">NID</label>
                        <input type="text" name="nid" value="{{ old('nid', $dosen->nid) }}"
                            class="border rounded w-full px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}"
                            class="border rounded w-full px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Alamat</label>
                        <textarea name="alamat" rows="3"
                                class="border rounded w-full px-3 py-2">{{ old('alamat', $dosen->alamat) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Mata Kuliah</label>
                        <input type="text" name="matakuliah" value="{{ old('matakuliah', $dosen->matakuliah) }}"
                            class="border rounded w-full px-3 py-2">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('dosen.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                            Batal
                        </a>

                        <button type="submit"
                            class="px-4 py-2 rounded"
                            style="background-color: #87898bff !important; color: white !important;">
                            Update
                        </button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>