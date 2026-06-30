<div class="min-h-screen bg-[#FFF8E8]">

    <!-- ================= NAVBAR ================= -->

    <nav class="border-b border-[#D9B54A] bg-white">

        <div class="max-w-7xl mx-auto px-8 py-5 flex items-center">

            <div class="w-14 h-14 rounded-2xl bg-[#B88900] flex items-center justify-center shadow-md">

                <i class="fa-solid fa-wallet text-white text-2xl"></i>

            </div>

            <h1 class="ml-4 text-4xl font-extrabold text-black tracking-wide">
                ExpenseIQ
            </h1>

        </div>

    </nav>

    <!-- ================= HERO ================= -->

    <section class="max-w-7xl mx-auto px-8 py-24">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- LEFT -->

            <div>

                <h1 class="text-[72px] leading-[82px] font-extrabold text-[#5B4300]">

                    Track your<br>
                    Expenses.<br>
                    Master your<br>
                    Money.

                </h1>

                <p class="mt-10 text-xl leading-9 text-gray-500 max-w-xl">

                    Take control of your finances with ExpenseIQ.
                    Record every expense, stay within your budget,
                    and generate reports that help you understand
                    where your money goes.

                </p>

                <div class="flex gap-6 mt-14">

                    <a
                        wire:navigate
                        href="{{ route('register') }}"
                        class="px-10 py-4 rounded-xl bg-white border-2 border-pink-300 font-bold text-lg hover:bg-pink-50 transition duration-300">

                        Create Account

                    </a>

                    <a
                        wire:navigate
                        href="{{ route('login') }}"
                        class="px-12 py-4 rounded-xl bg-white border-2 border-pink-300 font-bold text-lg hover:bg-yellow-100 transition duration-300">

                        Log In

                    </a>

                </div>

            </div>

            <!-- RIGHT -->

            <div>

                <h2 class="text-center text-4xl font-bold text-[#5B4300] mb-12">

                    Everything you need to stay on budget

                </h2>

                <!-- Feature cards dito sa Part 2 -->
                 <div class="grid grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($features as $feature)

                        <div
                            class="bg-white border-2 border-[#D9B54A] rounded-[28px] p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                            <!-- Icon -->
                            <div
                                class="w-16 h-16 rounded-2xl bg-[#FFD6E7] flex items-center justify-center mb-5">

                                <i class="fa-solid {{ $feature['icon'] }} text-2xl text-[#5B4300]"></i>

                            </div>

                            <!-- Title -->

                            <h3 class="text-xl font-bold text-[#4A3500] mb-3">

                                {{ $feature['title'] }}

                            </h3>

                            <!-- Description -->

                            <p class="text-gray-500 text-sm">

                                {{ $feature['description'] }}

                            </p>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

</div>