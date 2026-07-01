<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | ExpenseIQ</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-[#FFF8E8]">

<div class="min-h-screen flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-7xl grid lg:grid-cols-2 gap-20 items-center">

        <!-- LEFT -->

        <div class="hidden lg:block">

            <div class="flex items-center gap-4 mb-10">

                <div class="w-14 h-14 rounded-2xl bg-[#B88900] flex items-center justify-center">

                    <i class="fa-solid fa-wallet text-white text-2xl"></i>

                </div>

                <h1 class="text-4xl font-bold">
                    ExpenseIQ
                </h1>

            </div>

            <h2 class="text-6xl font-extrabold text-[#5B4300] leading-tight">

                Start tracking your
                <br>
                money today.

            </h2>

            <p class="mt-8 text-lg text-gray-600 leading-8 max-w-lg">

                Create your ExpenseIQ account and start managing your expenses,
                monthly budget, and financial reports with ease.

            </p>

            <div class="mt-12 space-y-5">

                <div class="flex items-center gap-4">

                    <i class="fa-solid fa-circle-check text-yellow-600 text-xl"></i>

                    <span>Free account — no credit card needed</span>

                </div>

                <div class="flex items-center gap-4">

                    <i class="fa-solid fa-circle-check text-yellow-600 text-xl"></i>

                    <span>Set budget per category</span>

                </div>

                <div class="flex items-center gap-4">

                    <i class="fa-solid fa-circle-check text-yellow-600 text-xl"></i>

                    <span>Export your data anytime</span>

                </div>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <h2 class="text-3xl font-bold text-center text-[#5B4300]">

                Create Account

            </h2>

            <p class="text-center text-gray-500 mt-2 mb-8">

                Fill in the information below.

            </p>

            @if ($errors->any())

                <div class="mb-6 rounded-lg bg-red-50 border border-red-300 p-4">

                    <ul class="text-sm text-red-600 list-disc ml-5">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('register.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-2 gap-5">

                    <div>

                        <label class="font-medium text-sm">
                            FIRST NAME
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            class="mt-2 w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 outline-none"
                            required>

                    </div>

                    <div>

                        <label class="font-medium text-sm">
                            LAST NAME
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            class="mt-2 w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 outline-none"
                            required>

                    </div>

                </div>

                <div class="mt-5">

                    <label class="font-medium text-sm">
                        EMAIL ADDRESS
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="mt-2 w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 outline-none"
                        required>

                </div>

                <div class="mt-5">

                    <label class="font-medium text-sm">
                        PASSWORD
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="mt-2 w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 outline-none"
                        required>

                </div>

                <div class="mt-5">

                    <label class="font-medium text-sm">
                        CONFIRM PASSWORD
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="mt-2 w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 outline-none"
                        required>

                </div>

                <div class="flex items-start mt-6">

                    <input
                        type="checkbox"
                        name="terms"
                        value="1"
                        class="mt-1">

                    <label class="ml-3 text-sm text-gray-600">

                        I agree to the
                        <span class="font-semibold">
                            Terms of Service
                        </span>
                        and
                        <span class="font-semibold">
                            Privacy Policy
                        </span>

                    </label>

                </div>

                <button
                    type="submit"
                    class="mt-8 w-full bg-[#B88900] hover:bg-[#9E7600] transition text-white font-bold py-4 rounded-xl">

                    CREATE ACCOUNT

                </button>

            </form>

            <p class="text-center mt-8 text-gray-600">

                Already have an account?

                <a href="{{ route('login') }}"
                   class="font-semibold text-[#B88900] hover:underline">

                    Log In

                </a>

            </p>

        </div>

    </div>

</div>

</body>
</html>