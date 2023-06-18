<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Available Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="card-actions justify-end">
                        <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>
                    </div>
                    @if(session()->has('alert.success') || session()->has('alert.error'))
                    <x-alert-component />
                    @endif
                    <div class="text-gray-900">
                        <div class="overflow-x-auto">
                            <table class="table table-zebra w-full">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->product_id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->default_price }}</td>
                                        <td>
                                            <a class="btn btn-success p-3"
                                                href="{{ route('subscriptions.checkout', ['product_id' => $product->product_id, 'type' => 'subscription']) }}">Purchase</a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
