@php  
    $class ??= null;
    $name ??= '';
    $label ??= '';
    $required ??= false;
    $hasError ??= false;
    $inputClass ??= null;
    $value ??= null;
    $rows ??= 4;
@endphp

<div @class(['flex flex-col', $class])>
    <label for="{{ $name }}" class="text-sm font-medium text-armadillo-900 block mb-2 ">{{ $label }}  @if($required) <span class="text-red-500">*</span> @endif</label>
    <textarea name="{{ $name }}" rows="{{ $rows }}" placeholder="Votre message" maxlength="160" @class(['p-4 rounded-xl resize-none outline-asparagus-600', 'border border-red-500' => $hasError, $inputClass])>{{ $value }}</textarea>

    @error($name)
        <div class="text-sm font-medium text-red-500 mt-1">
            {{ $message }}
        </div>
    @enderror
</div>