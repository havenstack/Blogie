<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New blog post') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
                    <form method="post" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', '')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <x-select name="state" :options="$categories" :name="'category_id'"/>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>

                        <div>
                            <div id="editor">
                                {!! old('content', '') !!}
                            </div>
                            <textarea name="content" id="content" class="hidden">{!! old('content', '') !!}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    var options = {
        placeholder: 'Waiting for your precious content',
        theme: 'snow'
    };

    var editor = new Quill('#editor', options);

    var content = document.getElementById('content');

    editor.on('text-change', function() {
        var justHtml = editor.root.innerHTML;
        content.innerHTML = justHtml;
    });
</script>
