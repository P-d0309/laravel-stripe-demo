<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div @class(['card shadow-xl', 'bg-green-300' => $status !== 'error', 'bg-red-300' => $status == 'error'])>
                <div class="card-body">
                    <div class="text-gray-900 ">
                        <div class="overflow-x-auto">
                            <p @class(['text-green-950' => $status !== 'error', 'text-red-950' => $status == 'error'])>
                                @if($status == 'error')
                                Sorry, the payment has been cancled. Please try again to proceed again.
                                @else
                                Payment has been made successfully. Thanks for the purchase.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
