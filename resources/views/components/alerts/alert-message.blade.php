@props(['message'])

@if ($message)
    <div {{ $attributes->merge(['class' => 'm-2 font-medium text-sm text-green-600 dark:text-green-400 alert-message']) }}>
        {{ $message }}
    </div>
@endif
