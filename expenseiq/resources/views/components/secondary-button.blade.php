@props([
    'href' => '#',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'w-full sm:w-60 py-4 rounded-xl border border-[#B99716] text-[#5B4500] bg-white text-center font-semibold shadow hover:bg-yellow-50 hover:shadow-lg transition-all'
    ]) }}
>

    {{ $slot }}

</a>