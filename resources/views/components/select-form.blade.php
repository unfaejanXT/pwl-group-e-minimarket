@props(['options', 'selectedValue', 'name', 'placeholder'])

<select {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}">
    @if ($placeholder)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif

    @foreach ($options as $key => $label)
        <option value="{{ $key }}" {{ $key == $selectedValue ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
