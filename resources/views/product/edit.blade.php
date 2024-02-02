

@extends('layouts.master')

@section('title')
    add Product
@endsection




@section('content')
    <main id="main" class="pt-16 h-screen px-28">
        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">Edit </span>  product
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="list-disc mt-2 ml-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="w-full overflow-x-auto">

                <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
                    <div class="container mx-auto p-4">
                        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Product Data</h1>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">Here you can edit product's informations.</p>
                            <form action="product/update" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">

                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" placeholder="product Name" name="name" value="{{$product->name}}"
                                           class="border p-2 rounded w-full">
                                    <input type="text" placeholder="description" name="description" value="{{$product->description}}"
                                           class="border p-2 rounded w-full">
                                    <input type="text" placeholder="price" name="price" value="{{$product->price}}"
                                           class="border p-2 rounded w-full">
                                    <select name="user_id">
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    <select name="categorie_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">

                                    <button type="submit"
                                        class="px-4 py-2 bg-primary-100 rounded  text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                        Confirm And Submit
                                    </button>

                                    <button type="button"
                                        class="px-4 py-2 bg-orange rounded  text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                        Cancel
                                    </button>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>
@endsection
