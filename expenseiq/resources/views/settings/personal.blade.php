<div class="flex-1">

    <div class="mx-auto w-full max-w-[700px] py-8">

        <h1 class="text-[44px] font-extrabold text-[#5D4300]">
            Personal Information
        </h1>

        <p class="text-[24px] text-[#5D4300] mb-10">
            Manage your name, email, and display name.
        </p>

        <!-- Personal Card -->

        <div class="bg-white border border-[#E6B400] rounded-[36px] overflow-hidden">

            <!-- Nickname -->

            <div class="grid grid-cols-3 items-center px-14 py-10">

                <h2 class="text-[28px] font-bold text-[#5D4300]">
                    Nickname
                </h2>

                <p class="text-[28px] text-center">
                    {{ $user->nickname }}
                </p>

                <button class="text-pink-500 font-bold text-[26px] justify-self-end">
                    Edit
                </button>

            </div>

            <div class="border-t border-[#E6B400]"></div>

            <!-- Full Name -->

            <div class="grid grid-cols-3 items-center px-14 py-10">

                <h2 class="text-[28px] font-bold text-[#5D4300]">
                    Full name
                </h2>

                <p class="text-[28px] text-center">
                    {{ $user->first_name }} {{ $user->last_name }}
                </p>

                <button class="text-pink-500 font-bold text-[26px] justify-self-end">
                    Edit
                </button>

            </div>

            <div class="border-t border-[#E6B400]"></div>

            <!-- Email -->

            <div class="grid grid-cols-3 items-center px-14 py-10">

                <h2 class="text-[28px] font-bold text-[#5D4300]">
                    Email Address
                </h2>

                <p class="text-[28px] text-center break-all">
                    {{ $user->email }}
                </p>

                <button class="text-pink-500 font-bold text-[26px] justify-self-end">
                    Edit
                </button>

            </div>

        </div>

        <h2 class="text-[34px] font-bold text-[#5D4300] mt-16 mb-6">
            Budget Preference
        </h2>

        <div class="bg-white border border-[#E6B400] rounded-[36px]">

            <div class="grid grid-cols-3 items-center px-14 py-10">

                <h2 class="text-[28px] font-bold text-[#5D4300]">
                    Monthly Budget
                </h2>

                <p class="text-[28px] text-center">
                    ₱ {{ number_format($user->monthly_budget,2) }}
                </p>

                <button class="text-pink-500 font-bold text-[26px] justify-self-end">
                    Edit
                </button>

            </div>

        </div>

    </div>

</div>