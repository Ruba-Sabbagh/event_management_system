@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400 alert alert-success']) }} role="alert">
        {{ $status }}
    </div>
@endif
