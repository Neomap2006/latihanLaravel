<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Matakuliah
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <form action="{{ route('matakuliah.update', $matkul->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-white">Nama Matakuliah</label>
                        <input type="text" name="nama_matkul" 
                            value="{{ old('nama_matkul', $matkul->nama_matkul) }}"
                            class="border rounded w-full px-3 py-2 text-black">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Deskripsi</label>
                        <input type="text" name="deskripsi" 
                            value="{{ old('deskripsi', $matkul->deskripsi) }}"
                            class="border rounded w-full px-3 py-2 text-black">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('matakuliah.index') }}"
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
