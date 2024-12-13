@if(session()->has('success'))
    <div class="flash-alert max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="flash-alert max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 font-medium text-sm text-green-600 dark:text-red-400">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif
