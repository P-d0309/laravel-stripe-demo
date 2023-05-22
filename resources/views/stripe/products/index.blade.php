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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
