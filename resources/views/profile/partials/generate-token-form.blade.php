<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Generate API token') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Generated token can be used to access API. Token expires after 1 hour.') }}
        </p>
    </header>

    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'generate-token')"
    >{{ __('Generate token') }}</x-primary-button>

    <x-modal name="generate-token" :show="$errors->tokenGeneration->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.token.create') }}" class="p-6">
            @csrf
            @method('post')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to generate new API token?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once new API token is generated, old once are no longer valid.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Generate token') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
