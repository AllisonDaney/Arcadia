@php  
    $class ??= null;
    $inputClass ??= null;
    $name ??= '';
    $label ??= '';
    $options ??= [];
    $required ??= false;
    $hasError ??= false;
@endphp

<div @class(['flex flex-col', $class])>
    <label for="{{ $name }}" class="text-sm font-medium text-armadillo-900 block mb-2 ">{{ $label }}  @if($required) <span class="text-red-500">*</span> @endif</label>
    <select name="{{ $name }}" @class(['p-4 rounded-xl resize-none outline-asparagus-600', 'border border-red-500' => $hasError, $inputClass])>
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}">{{ $option['label'] }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="text-sm font-medium text-red-500 mt-1">
            {{ $message }}
        </div>
    @enderror
</div>