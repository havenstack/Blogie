@props(['defaultValue' => null])
@props(['name' => null])
@props(['options' => null])

<select
    name="{{ $name }}"
    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
>
    <option value="">-</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}" @if(old($name, $defaultValue) == $key) selected @endif>{{ $value }}</option>
    @endforeach
</select>
