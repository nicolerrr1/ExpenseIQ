@props([
    'icon',
    'title',
    'description',
])

<div class="bg-white rounded-3xl border border-[#E4B300] p-6 min-h-[220px] shadow-md hover:shadow-xl transition-all duration-300">

    <div class="flex items-center gap-3 mb-4">

        <div class="w-12 h-12 rounded-xl bg-pink-200 flex items-center justify-center flex-shrink-0">

            <i class="fa-solid {{ $icon }} text-[#B99716] text-lg"></i>

        </div>

        <h3 class="font-bold text-base text-[#3F3100] leading-5">

            {{ $title }}

        </h3>

    </div>

    <p class="mt-2 text-sm text-gray-500 leading-6">

        {{ $description }}

    </p>

</div>