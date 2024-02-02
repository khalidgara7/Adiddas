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
            <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
                <div class="container mx-auto p-4">
                    <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Product Data</h1>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">Here you can add product's informations.</p>
                        <form action="/productstore" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="name" name="name" placeholder="Product Name" class="border p-2 rounded w-full">

                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <input type="text" id="description" name="description" placeholder="Description" class="border p-2 rounded w-full">

                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="text" id="price" name="price" placeholder="Price" class="border p-2 rounded w-full">

                                <select name="user_id">
                                    <option value=""> </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                <select name="categorie_id">
                                    <option value=""> </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label> Image </label>
                                    <input type="file" class="form-control" name="image_path">
                                </div>

                            </div>

                            <div class="mb-4">
                                <button type="submit" class="px-4 py-2 bg-primary-100 rounded text-white hover:bg-blue-600 focus:outline-none transition-colors">Confirm And Submit</button>
                                <button type="button" class="px-4 py-2 bg-orange rounded text-white hover:bg-blue-600 focus:outline-none transition-colors">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
