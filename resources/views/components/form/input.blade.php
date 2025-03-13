@props(['name'])

<input class="form-control" name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }}>