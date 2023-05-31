<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Coba</h1>

                <!-- Form Pertanyaan -->
                <form action="{{ route('admin.submitQuestion') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <x-label for="question" value="{{ __('Pertanyaan') }}" />
                        <x-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="usertype" value="{{ __('Jenis Pengguna') }}" />
                        <select id="usertype" class="block mt-1 w-full" name="usertype" required>
                            <option value="2">Mahasiswa</option>
                            <option value="3">Dosen</option>
                            <option value="4">Staff</option>
                            <option value="5">Mitra</option>
                            <option value="6">Alumni</option>
                            <option value="7">Pengguna Lulusan</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="answer_type" value="{{ __('Tipe Jawaban') }}" />
                        <select id="answer_type" class="block mt-1 w-full" name="answer_type" required>
                            <option value="saran">Saran</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>

                    <!-- Tambahan Field untuk Jawaban Saran -->
                    <div class="mt-4" id="saran_field" style="display: none;">
                        <x-label for="saran" value="{{ __('Jawaban Saran') }}" />
                        <textarea id="saran" class="block mt-1 w-full" name="saran"></textarea>
                    </div>

                    <!-- Tambahan Field untuk Jawaban Rating -->
                    <div class="mt-4" id="rating_field" style="display: none;">
                        <x-label for="rating" value="{{ __('Jawaban Rating') }}" />
                        <select id="rating" class="block mt-1 w-full" name="rating">
                            <option value="sangat_puas">Sangat Puas</option>
                            <option value="puas">Puas</option>
                            <option value="cukup_puas">Cukup Puas</option>
                            <option value="tidak_puas">Tidak Puas</option>
                            <option value="sangat_tidak_puas">Sangat Tidak Puas</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Kirim Pertanyaan') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
