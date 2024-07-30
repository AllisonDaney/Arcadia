@php  
    $class ??= null;
    $inputClass ??= null;
    $name ??= '';
    $label ??= '';
    $options ??= [];
    $value ??= null;
    $required ??= false;
    $hasError ??= false;
    $multiple ??= false;
    $itemValue ??= 'id';
    $itemLabel ??= 'label';
    $placeholder ??= null;
@endphp

<div @class(['flex flex-col', $class])>
    <label for="{{ $name }}" class="text-sm font-medium text-armadillo-900 block mb-2 ">{{ $label }}  @if($required) <span class="text-red-500">*</span> @endif</label>
    <select name="{{ $name }}" @class(['p-4 rounded-xl resize-none outline-asparagus-600', 'border border-red-500' => $hasError, $inputClass]) @if($multiple) multiple @endif>
        @if($placeholder)
            <option value="none">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $option)
            <option value="{{ $option[$itemValue] }}" @selected($multiple && is_array($value) ? in_array($option[$itemValue], $value) : $value == $option[$itemValue])>{{ $option[$itemLabel] }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="text-sm font-medium text-red-500 mt-1">
            {{ $message }}
        </div>
    @enderror
</div>