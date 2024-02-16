@extends('layouts.master')

@section('title')
    Add Product
@endsection

@section('content')
    <main id="main" class="pt-16 h-screen px-28">
        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">Add </span> a new product
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <!-- Form Content -->
            @if(session("success"))
                <div class="flex items-center p-4 mt-3 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
                    </div>
                </div>
            @endif
            <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
                <div class="container mx-auto p-4">
                    <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Product Data</h1>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">Here you can add product's informations.</p>
                        <form action="/productstore" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">
                                    Name
                                        @error("name")
                                         <div class="text-red-500"> {{ $message }} </div>
                                        @enderror
                                    <input type="text" id="name" name="name" placeholder="Product Name" class="border p-2 rounded w-full">
                                </label>

                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Description</label>
                                @error("description")
                                <div class="text-red-500"> {{ $message }} </div>
                                @enderror
                                <input type="text" id="description" name="description" placeholder="Description" class="border p-2 rounded w-full">

                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Price</label>
                                <input type="text" id="price" name="price" placeholder="Price" class="border p-2 rounded w-full">
                                @error("price")
                                <div class="text-red-500"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div>

                            </div>
                            <div class="form-group">
                                <label> Image </label>
                                <input type="file" class="form-control" name="image_path">
                            </div>
                            @error("image_path")
                            <div class="text-red-500"> {{ $message }} </div>
                            @enderror

                            <select name="user_id">
                                <option value=""> Users </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error("user_id")
                            <div class="text-red-500"> {{ $message }} </div>
                            @enderror

                            <select name="categorie_id">
                                <option value=""> Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error("categorie_id")
                            <div class="text-red-500"> {{ $message }} </div>
                            @enderror

                            <div class="mb-4">
                                <button type="submit" class="px-4 py-2 bg-primary-100 rounded text-white hover:bg-blue-600 focus:outline-none transition-colors">Confirm And Submit</button>
                                <a href="/product">
                                    <button type="button" class="px-4 py-2 bg-orange rounded text-white hover:bg-blue-600 focus:outline-none transition-colors">Cancel</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
