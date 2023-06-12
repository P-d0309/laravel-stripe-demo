<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Subscription
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" id="payment-element">

                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('pk_test_51N3syISJQlJBuOFzbkNpU96ou3awLuD1I6sukz9s5PckxoLGs3FYEulE9YE5wuynY6V5KCjZzJCYrxCtdLxvzDSz000168MOne');
        console.log("🚀 ~ file: create.blade.php:21 ~ stripe:", stripe)
        const appearance = {
            theme: 'flat',
            variables: { colorPrimaryText: '#262626' }
        };

        const options = {
            layout: {
                type: 'tabs',
                defaultCollapsed: false,
            }
        };

        const elements = stripe.elements({ clientSecret, appearance });
        const paymentElement = elements.create('payment', options);
        paymentElement.mount('#payment-element');
    </script>
    @endpush
</x-app-layout>
