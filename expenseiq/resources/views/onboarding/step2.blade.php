<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ExpenseIQ | Monthly Budget</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#FFF7F2] flex items-center justify-center p-8">

<div class="w-full max-w-6xl bg-white rounded-[40px] shadow-xl overflow-hidden grid grid-cols-2">

    <!-- LEFT -->

    <div class="bg-[#F3C400] flex flex-col justify-center items-center p-12">

        <div class="text-7xl mb-6">
            💰
        </div>

        <h2 class="text-4xl font-bold text-[#4D3900] text-center">

            Almost there!

        </h2>

        <p class="text-[#5D4300] text-center mt-4 text-lg">

            Set your monthly budget to start tracking your expenses.

        </p>

    </div>

    <!-- RIGHT -->

    <div class="flex items-center justify-center">

        <form
            action="{{ route('welcome.step2.save') }}"
            method="POST"
            class="w-full max-w-md"
        >

            @csrf

            <h1 class="text-5xl font-extrabold text-[#4D3900] mb-4">

                Monthly Budget

            </h1>

            <p class="text-gray-500 text-lg mb-10">

                Enter your total monthly budget.

            </p>

            <label class="block text-lg font-semibold mb-3">

                Budget

            </label>

            <input
                type="number"
                name="budget"
                min="1"
                step="0.01"
                placeholder="₱ 35,000"
                class="w-full h-16 rounded-2xl border-2 border-gray-300 px-5 text-xl focus:outline-none focus:border-yellow-400"
                required
            >

            @error('budget')

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