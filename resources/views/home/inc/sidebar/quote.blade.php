<div class="mt-8 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="p-5">
        <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">Quote Of the day</h5>
    </div>
    <hr>
    <div class="p-5 ">
        <p>
            @php
                $str = \Illuminate\Foundation\Inspiring::quote();
                $str = explode('-', $str);
                $quote = $str[0];
                $author = end($str);
            @endphp
            {{ $quote }}
        </p>
        <span class="text-gray-400 text-sm">- {{ $author }}</span>
    </div>
</div>
