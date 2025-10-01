<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Ruangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                {{-- Notifikasi --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Kode Ruangan</label>
                        <input type="text" name="kode_ruangan"
                            value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}"
                                class="border rounded w-full px-3 py-2 text-black">

                        @error('kode_ruangan')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan"
                            value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                            class="border rounded w-full px-3 py-2 text-black">

                        @error('nama_ruangan')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Kapasitas</label>
                        <input type="teks" name="kapasitas"
                        value="{{ old('kapasitas', $ruangan->kapasitas) }}"
                            class="border rounded w-full px-3 py-2 text-black">
                        @error('kapasitas')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('ruangan.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                        Cancel
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
