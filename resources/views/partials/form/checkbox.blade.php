@php  
    $class ??= null;
    $inputClass ??= null;
    $name ??= '';
    $label ??= '';
    $required ??= false;
    $hasError ??= false;
    $value ??= null;
    $labelLink ??= '';
    $labelLinkText ??= '';
@endphp

<div @class(['flex flex-col gap-2', $class])>
    <div class="flex items-center gap-4">
        <input type="checkbox" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $label }}" @class(['p-4 rounded-xl resize-none outline-asparagus-6000', 'border border-red-500' => $hasError, $inputClass]) @checked(old($name))>
        <label for="{{ $name }}" class="text-sm font-medium text-armadillo-900 block ">{{ $label }} <a href="{{ $labelLink }}" target="_blank" class="font-semibold text-asparagus-500 underline">{{ $labelLinkText }}</a> @if($required) <span class="text-red-500">*</span> @endif</label>
    </div>

    @error($name)
        <div class="text-sm font-medium text-red-500 mt-1">
            {{ $message }}
        </div>
    @enderror
</div>