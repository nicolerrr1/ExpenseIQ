@props([
    'href' => '#',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'w-full sm:w-60 py-4 rounded-xl bg-[#B99716] text-white text-center font-semibold shadow hover:bg-[#9F8312] hover:shadow-lg transition-all'
    ]) }}
>

    {{ $slot }}

</a>