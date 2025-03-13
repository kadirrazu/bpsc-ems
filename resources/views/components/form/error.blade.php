@props(['name'])

@error($name)
    <p class="mt-2 text-danger">{{ $message }}</p>
@enderror