@props(['title', 'value', 'color' => 'blue'])

<div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4 text-center hover:scale-[1.02] transition-transform">
    <h4 class="text-gray-500 text-sm font-medium">{{ $title }}</h4>
    <p class="text-2xl font-bold text-{{ $color }}-500 mt-1 dark:text-{{ $color }}-400">{{ $value }}
    </p>
</div>
