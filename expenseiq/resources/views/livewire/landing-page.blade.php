<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpenseIQ</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white">

    <!-- Navbar -->
    <nav class="border-b border-yellow-300 bg-white">
        <div class="max-w-7xl mx-auto px-8 py-5 flex items-center">

            <!-- Logo -->
            <div class="w-12 h-12 rounded-xl bg-yellow-600 flex items-center justify-center shadow">

                <!-- Wallet -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 7h18v10H3V7zm14-3H5a2 2 0 00-2 2v1h18V6a2 2 0 00-2-2z"/>
                </svg>

            </div>

            <h1 class="ml-4 text-4xl font-extrabold text-black">
                ExpenseIQ
            </h1>

        </div>
    </nav>

    <!-- HERO -->
    <section class="bg-[#FFF9E7] border-b border-yellow-300">

        <div class="max-w-7xl mx-auto px-10 py-24">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- LEFT -->
                <div>

                    <h1 class="text-7xl font-extrabold leading-tight text-[#5A4300]">

                        Track your<br>

                        Expenses.<br>

                        Master your<br>

                        Money.

                    </h1>

                    <p class="mt-12 text-3xl text-gray-500 leading-relaxed max-w-xl">

                        Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.

                    </p>

                </div>

                <!-- RIGHT -->
                <div>

                    <h2 class="text-center text-4xl font-bold text-[#6B5300] mb-10">

                        Everything you need to stay on budget

                    </h2>

                    <div class="grid grid-cols-2 xl:grid-cols-3 gap-8">

                        @php

                            $features = [

                                'Expense Entry',

                                'Monthly Budget',

                                'Budget Alert',

                                'View Reports',

                                'Export Reports',

                                'User Accounts'

                            ];

                        @endphp

                        @foreach($features as $feature)

                        <div class="bg-white rounded-3xl border-2 border-yellow-400 p-6 shadow-sm hover:shadow-lg transition">

                            <div class="w-14 h-14 rounded-2xl bg-pink-200 mb-6">

                            </div>

                            <h3 class="font-bold text-2xl mb-4">

                                {{ $feature }}

                            </h3>

                            <p class="text-gray-400 leading-relaxed">

                                Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore.

                            </p>

                        </div>

                        @endforeach

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-center gap-10 mt-14">

                        <a href="{{ route('register') }}"

                           class="px-14 py-4 text-2xl font-bold rounded-xl border-2 border-pink-400 bg-white hover:bg-pink-50 transition">

                            Create Account

                        </a>

                        <a href="{{ route('login') }}"

                           class="px-16 py-4 text-2xl font-bold rounded-xl border-2 border-pink-400 bg-white hover:bg-pink-50 transition">

                            Log In

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @livewireScripts

</body>
</html>