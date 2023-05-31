<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Pertnyaan Staff</h1>

                <!-- Form Pertanyaan -->
                <form action="{{ route('staff.submitAnswer') }}" method="POST">
                    @csrf
                    @foreach ($questions as $question)
                        @if ($question->usertype == auth()->user()->usertype)
                            <div class="mt-4">
                                <x-label for="question_{{ $question->id }}" value="{{ $question->question }}" />
                                @if ($question->answer_type == 'saran')
                                    <x-input id="question_{{ $question->id }}" class="block mt-1 w-full" type="text" name="answer_saran[{{ $question->id }}]" :value="old('answer_saran.' . $question->id)" required autofocus />
                                @elseif ($question->answer_type == 'rating')
                                    <!-- Tambahkan inputan sesuai dengan tipe jawaban rating -->
                                    <!-- Misalnya: -->
                                    <div>
                                        <input type="radio" id="answer_{{ $question->id }}_sangat_puas" name="answer_rating[{{ $question->id }}]" value="sangat_puas" required> Sangat Puas
                                        <input type="radio" id="answer_{{ $question->id }}_puas" name="answer_rating[{{ $question->id }}]" value="puas" required> Puas
                                        <input type="radio" id="answer_{{ $question->id }}_cukup_puas" name="answer_rating[{{ $question->id }}]" value="cukup_puas" required> Cukup Puas
                                        <input type="radio" id="answer_{{ $question->id }}_tidak_puas" name="answer_rating[{{ $question->id }}]" value="tidak_puas" required> Tidak Puas
                                        <input type="radio" id="answer_{{ $question->id }}_sangat_tidak_puas" name="answer_rating[{{ $question->id }}]" value="sangat_tidak_puas" required> Sangat Tidak Puas
                                    </div>
                                @endif
                                <input type="hidden" name="question_id[]" value="{{ $question->id }}">
                            </div>
                        @endif
                    @endforeach
                
                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Kirim Jawaban') }}
                        </x-button>
                    </div>
                </form>
                                
            </div>
        </div>
    </div>
</x-app-layout>
