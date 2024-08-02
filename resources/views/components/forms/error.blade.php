@props(['name', 'bag' => null])

@error($name, $bag)
    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
@enderror
