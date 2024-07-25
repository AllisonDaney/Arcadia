@php  
    $class ??= null;
    $name ??= '';
    $label ??= '';
    $required ??= false;
    $hasError ??= false;
@endphp

<div @class(['flex flex-col', $class])>
    <label for="{{ $name }}" class="text-sm font-medium text-armadillo-900 block mb-2 ">{{ $label }}  @if($required) <span class="text-red-500">*</span> @endif</label>
    <textarea name="{{ $name }}" rows="4" placeholder="Votre message" maxlength="160" @class(['p-4 rounded-xl resize-none outline-asparagus-600', 'border border-red-500' => $hasError])></textarea>

    @error($name)
        <div class="text-sm font-medium text-red-500 mt-1">
            {{ $message }}
        </div>
    @enderror
</div>