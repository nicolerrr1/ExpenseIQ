<div class="flex-1">

    <div class="mx-auto w-full max-w-[980px] py-8">

        <!-- Title -->

        <h1 class="text-[44px] font-extrabold text-[#5D4300]">
            Personal Information
        </h1>

        <p class="text-[24px] text-[#5D4300] mb-10">
            Manage your name, email, and display name.
        </p>

        <!-- Personal Information Card -->

        <div class="bg-white border border-[#E6B400] rounded-[36px] overflow-hidden">

            <!-- Nickname -->

            <div class="grid grid-cols-[220px_1fr_100px] items-center px-14 py-9">

                <h2 class="text-[26px] font-bold text-[#5D4300]">
                    Nickname
                </h2>

                <p class="text-[26px]">
                    {{ $user->nickname }}
                </p>

                <button
                    type="button"
                    onclick="openModal('nicknameModal')"
                    class="text-pink-500 font-bold text-[24px] hover:underline text-right">

                    Edit

                </button>

            </div>

            <div class="border-t border-[#E6B400]"></div>

            <!-- Full Name -->

            <div class="grid grid-cols-[220px_1fr_100px] items-center px-14 py-9">

                <h2 class="text-[26px] font-bold text-[#5D4300]">
                    Full Name
                </h2>

                <p class="text-[26px]">
                    {{ $user->first_name }} {{ $user->last_name }}
                </p>

                <button
                    type="button"
                    onclick="openModal('fullnameModal')"
                    class="text-pink-500 font-bold text-[24px] hover:underline text-right">

                    Edit

                </button>

            </div>

            <div class="border-t border-[#E6B400]"></div>

            <!-- Email -->

            <div class="grid grid-cols-[220px_1fr_100px] items-center px-14 py-9">

                <h2 class="text-[26px] font-bold text-[#5D4300]">
                    Email Address
                </h2>

                <p class="text-[24px] break-all">
                    {{ $user->email }}
                </p>

                <button
                    type="button"
                    onclick="openModal('emailModal')"
                    class="text-pink-500 font-bold text-[24px] hover:underline text-right">

                    Edit

                </button>

            </div>

        </div>

        <!-- Budget -->

        <h2 class="text-[34px] font-bold text-[#5D4300] mt-16 mb-6">
            Budget Preference
        </h2>

        <div class="bg-white border border-[#E6B400] rounded-[36px] overflow-hidden">

            <div class="grid grid-cols-[220px_1fr_100px] items-center px-14 py-9">

                <h2 class="text-[26px] font-bold text-[#5D4300]">
                    Monthly Budget
                </h2>

                <p class="text-[26px]">
                    ₱ {{ number_format($user->monthly_budget,2) }}
                </p>

                <button
                    type="button"
                    onclick="openModal('budgetModal')"
                    class="text-pink-500 font-bold text-[24px] hover:underline text-right">

                    Edit

                </button>

            </div>

        </div>

        <!-- Password & Security -->

        <div id="password" class="mt-16">

            <h2 class="text-[34px] font-bold text-[#5D4300] mb-6">
                Password & Security
            </h2>

            <div class="bg-white border border-[#E6B400] rounded-[36px] p-10 flex justify-between items-center">

                <div>

                    <h3 class="text-[26px] font-bold text-[#5D4300]">
                        Password
                    </h3>

                    <p class="text-[#6D5C30] mt-2">
                        Change your account password.
                    </p>

                </div>

                <button
                    type="button"
                    onclick="openModal('passwordModal')"
                    class="bg-[#7A5A00] text-white px-8 py-3 rounded-xl font-bold hover:bg-[#5D4300]">

                    Change Password

                </button>

            </div>

        </div>

        <!-- Danger Zone -->

        <div id="danger" class="mt-16 mb-16">

            <h2 class="text-[34px] font-bold text-[#B3123A] mb-6">
                Danger Zone
            </h2>

            <div class="bg-[#FFF2F4] border border-[#E79AA8] rounded-[36px] p-10">

                <p class="text-[#8C2740] text-lg mb-8">
                    These actions are permanent and cannot be undone.
                </p>

                <div class="flex gap-5">

                    <button
                        type="button"
                        onclick="openModal('clearDataModal')"
                        class="bg-white border border-[#C31E47] text-[#C31E47] font-bold px-8 py-3 rounded-xl hover:bg-red-50">

                        Clear All Data

                    </button>

                    <button
                        type="button"
                        onclick="openModal('deleteAccountModal')"
                        class="bg-[#C31E47] text-white font-bold px-8 py-3 rounded-xl hover:bg-red-700">

                        Delete Account

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>