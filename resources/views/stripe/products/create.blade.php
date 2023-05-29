<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="card-actions justify-end">
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Products</a>
                    </div>
                    <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="text-gray-900">
                        <div class="overflow-x-auto">
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3">
                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="label-text">Product Name:</span>
                                    </label>
                                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="name" value="{{ old('name') }}"/>
                                    @error('name')
                                        <label class="label">
                                            <span class="label-text text-red-500">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>
                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="label-text">Product Description:</span>
                                    </label>
                                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="description" value="{{ old('description') }}"/>
                                    @error('description')
                                    <label class="label">
                                        <span class="label-text text-red-500">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="label-text">Product Price:</span>
                                    </label>
                                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="default_price" value="{{ old('default_price') }}"/>
                                    @error('default_price')
                                    <label class="label">
                                        <span class="label-text text-red-500">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="label-text">Product Recurring Type:</span>
                                    </label>
                                    <select class="select select-bordered" name="interval">
                                        <option disabled selected>Pick one</option>
                                        <option value="day">Daily</option>
                                        <option value="week">Weekly</option>
                                        <option value="month">Monthly</option>
                                        <option value="year">Yearly</option>
                                    </select>
                                    @error('interval')
                                    <label class="label">
                                        <span class="label-text text-red-500">{{ $message }}</span>
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-6 md:grid-cols-12 mt-2">
                                <div class="form-control w-full">
                                    <button class="btn btn-succcess">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
