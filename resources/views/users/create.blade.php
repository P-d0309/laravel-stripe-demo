<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    {{-- <h2 class="card-title">Card title!</h2> --}}
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="form-control w-full ">
                                    <label class="label">
                                        <span class="label-text">What is your name?</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Type here" class="input input-bordered w-full " />
                                    @error('name')
                                        @include('common.error')
                                    @enderror
                                </div>

                                <div class="form-control w-full ">
                                    <label class="label">
                                        <span class="label-text">What is your Emails?</span>
                                    </label>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Type here" class="input input-bordered w-full " />
                                    @error('email')
                                        @include('common.error')
                                    @enderror
                                </div>

                                <div class="form-control w-full ">
                                    <label class="label">
                                        <span class="label-text">What is your Password?</span>
                                    </label>
                                    <input type="password" name="password" placeholder="Type here" class="input input-bordered w-full " />
                                    @error('password')
                                        @include('common.error')
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
