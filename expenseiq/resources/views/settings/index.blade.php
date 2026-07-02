<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - ExpenseIQ</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://kit.fontawesome.com/6b728d9c4e.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#FFFBEA]">

<div class="flex min-h-screen">

    {{-- ========================= --}}
    {{-- LEFT SIDEBAR --}}
    {{-- ========================= --}}

    <div class="w-[360px] bg-white border-r border-[#E5B600] flex flex-col">

        {{-- Header --}}
        <div class="border-b border-[#E5B600] px-8 py-7">

            <div class="flex items-center gap-5">

                <a href="{{ route('dashboard') }}"
                   class="w-11 h-11 rounded-full bg-[#6D5100] text-white flex items-center justify-center">

                    <i class="fa-solid fa-chevron-left"></i>

                </a>

                <h1 class="text-[28px] font-extrabold text-[#5D4300]">
                    Settings
                </h1>

            </div>

        </div>

        {{-- Your Account --}}
        <div class="mt-7">

            <p class="px-6 uppercase text-[#5D4300] text-sm font-bold">
                Your Account
            </p>

            {{-- Personal --}}
            <button
                class="mt-5 w-full flex items-center gap-4 px-6 py-5 bg-[#FFF2B8] border-y border-[#E5B600]">

                <div
                    class="w-12 h-12 rounded-full bg-[#FFE6A2] flex items-center justify-center">

                    <i class="fa-regular fa-user text-[#8D6300] text-xl"></i>

                </div>

                <div class="text-left">

                    <h3 class="font-bold text-[#5D4300]">
                        Personal Information
                    </h3>

                    <p class="text-sm text-[#6B5A30]">
                        Name, email, nickname
                    </p>

                </div>

            </button>

            {{-- Password --}}
            <button
                class="w-full flex items-center gap-4 px-6 py-5 hover:bg-[#FFF8DD]">

                <div
                    class="w-12 h-12 rounded-full bg-[#FFE6A2] flex items-center justify-center">

                    <i class="fa-solid fa-lock text-[#8D6300]"></i>

                </div>

                <div class="text-left">

                    <h3 class="font-bold text-[#5D4300]">
                        Password & Security
                    </h3>

                    <p class="text-sm text-[#6B5A30]">
                        Change your password
                    </p>

                </div>

            </button>

        </div>

        {{-- More --}}
        <div class="mt-12">

            <p class="px-6 uppercase text-[#5D4300] text-sm font-bold">
                More
            </p>

            <button
                class="mt-5 w-full flex items-center gap-4 px-6 py-5 hover:bg-[#FFF8DD]">

                <div
                    class="w-12 h-12 rounded-full bg-[#FFD7DC] flex items-center justify-center">

                    <i class="fa-solid fa-triangle-exclamation text-[#C71F47]"></i>

                </div>

                <div class="text-left">

                    <h3 class="font-bold text-[#B0143A]">
                        Danger Zone
                    </h3>

                    <p class="text-sm text-[#6B5A30]">
                        Delete data or account
                    </p>

                </div>

            </button>

        </div>

    </div>



    {{-- ========================= --}}
    {{-- RIGHT CONTENT --}}
    {{-- ========================= --}}

    <div class="flex-1 px-14 py-10">

        <div class="max-w-[1050px]">

            <h1 class="text-[42px] font-extrabold text-[#5D4300]">
                Personal Information
            </h1>

            <p class="text-[18px] text-[#6B5A30] mt-1 mb-8">
                Manage your name, email, and display name.
            </p>



            {{-- PERSONAL CARD --}}

            <div
                class="bg-white border border-[#E5B600] rounded-[34px] overflow-hidden">


                {{-- Nickname --}}

                <div class="grid grid-cols-[230px_1fr_90px] items-center px-14 py-8">

                    <h2 class="text-[26px] font-bold text-[#5D4300]">
                        Nickname
                    </h2>

                    <p class="text-[24px] text-[#5D4300]">
                        {{ $user->nickname }}
                    </p>

                    <button
                        class="justify-self-end text-pink-500 font-bold text-[24px]">

                        Edit

                    </button>

                </div>

                <div class="border-t border-[#E5B600]"></div>


                {{-- Full Name --}}

                <div class="grid grid-cols-[230px_1fr_90px] items-center px-14 py-8">

                    <h2 class="text-[26px] font-bold text-[#5D4300]">
                        Full name
                    </h2>

                    <p class="text-[24px] text-[#5D4300]">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </p>

                    <button
                        class="justify-self-end text-pink-500 font-bold text-[24px]">

                        Edit

                    </button>

                </div>

                <div class="border-t border-[#E5B600]"></div>


                {{-- Email --}}

                <div class="grid grid-cols-[230px_1fr_90px] items-center px-14 py-8">

                    <h2 class="text-[26px] font-bold text-[#5D4300]">
                        Email Address
                    </h2>

                    <p class="text-[24px] text-[#5D4300] break-all">
                        {{ $user->email }}
                    </p>

                    <button
                        class="justify-self-end text-pink-500 font-bold text-[24px]">

                        Edit

                    </button>

                </div>

            </div>



            {{-- Budget --}}

            <h2
                class="text-[32px] font-bold text-[#5D4300] mt-12 mb-5">

                Budget Preference.

            </h2>

            <div
                class="bg-white border border-[#E5B600] rounded-[34px]">

                <div
                    class="grid grid-cols-[230px_1fr_90px] items-center px-14 py-8">

                    <h2 class="text-[26px] font-bold text-[#5D4300]">
                        Monthly budget
                    </h2>

                    <p class="text-[24px] text-[#5D4300]">

                        ₱ {{ number_format($user->monthly_budget,2) }}

                    </p>

                    <button
                        class="justify-self-end text-pink-500 font-bold text-[24px]">

                        Edit

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>