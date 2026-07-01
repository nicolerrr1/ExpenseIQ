<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome | ExpenseIQ</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#FFF7F2] flex items-center justify-center p-8">

<div class="w-full max-w-6xl bg-white rounded-[40px] shadow-xl overflow-hidden grid grid-cols-2">

    <!-- LEFT -->
    <div class="bg-[#F3C400] flex flex-col justify-center items-center p-12">

        {{-- Temporary illustration --}}
        <img
            src="{{ asset('images/welcome-1.png') }}"
            onerror="this.style.display='none'"
            class="w-80 mb-6"
        >

        <div class="text-7xl mb-5">👋</div>

        <h2 class="text-4xl font-bold text-[#4D3900] text-center">

            Nice to meet you!

        </h2>

        <p class="text-[#5D4300] text-center mt-4 text-lg">

            Let's personalize your ExpenseIQ experience.

        </p>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center justify-center">

        <form
            action="{{ route('welcome.step1.save') }}"
            method="POST"
            class="w-full max-w-md"
        >

            @csrf

            <h1 class="text-5xl font-extrabold text-[#4D3900] mb-4">

                Welcome!

            </h1>

            <p class="text-gray-500 text-lg mb-10">

                What should we call you?

            </p>

            <label class="block text-lg font-semibold mb-3">

                Nickname

            </label>

            <input
                type="text"
                name="nickname"
                value="{{ old('nickname') }}"
                placeholder="Enter your nickname"
                class="w-full h-16 rounded-2xl border-2 border-gray-300 px-5 text-xl focus:outline-none focus:border-yellow-400"
                required
            >

            @error('nickname')

                <p class="text-red-500 mt-2">

                    {{ $message }}

                </p>

            @enderror

            <button
                type="submit"
                class="w-full mt-10 h-16 rounded-2xl bg-[#F3C400] hover:bg-yellow-500 text-[#4D3900] text-xl font-bold transition"
            >

                Continue →

            </button>

        </form>

    </div>

</div>

</body>
</html>