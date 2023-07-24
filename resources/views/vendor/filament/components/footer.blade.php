{{ \Filament\Facades\Filament::renderHook('footer.before') }}
 
<div class="filament-footer flex items-center justify-center">
  {{ \Filament\Facades\Filament::renderHook('footer.start') }}
 
  @if (config('filament.layout.footer.should_show_logo'))
    <a
      href="https://filamentphp.com"
      target="_blank"
      rel="noopener noreferrer"
      class="text-gray-300 transition hover:text-primary-500"
    >
      <img
        src="{{ asset('/images/MMC app logo 1.svg') }}"
        alt="Icon"
        class="h-20 dark:hidden"
      >
      <img
        src="{{ asset('/images/MMC app logo 2.svg') }}"
        alt="Icon"
        class="hidden h-20 dark:block"
      >
    </a>
  @endif
 
  {{ \Filament\Facades\Filament::renderHook('footer.end') }}
</div>
 
{{ \Filament\Facades\Filament::renderHook('footer.after') }}