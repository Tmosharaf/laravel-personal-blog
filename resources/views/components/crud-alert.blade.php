<div class="p-4 mt-6 mb-4 text-sm text-blue-700 dark:bg-blue-200 dark:text-blue-800" role="alert">
    @if ($status == 'danger')
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium">{{ $message }}</span>
        </div>
    @endif
    @if ($status == 'success')
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            <span class="font-medium">{{ $message }}</span>
        </div>
    @endif

</div>
