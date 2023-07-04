@props(['name'])

<label class="block mb-2  text-sm font-medium text-gray-700"
       for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>