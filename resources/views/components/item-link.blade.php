<div>
    <a href="/{{ $path }}"
        class="{{ Route::currentRouteName() === $path ? 'links-active' : 'links' }} sm:text-base lg:text-sm font-medium">
        {{ $slot }}
    </a>
</div>
