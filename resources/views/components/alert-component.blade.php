<div @class(['alert shadow-lg my-4', 'alert-success' => $alertType === 'success', 'alert-error' => $alertType == 'error'])>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ $alertMessage }}</span>
    </div>
</div>
