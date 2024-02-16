@extends('layouts.master')

@section('title')
    product management
@endsection

 @section('title_page')
    Dashboard
@endsection


@section('content')
    <main id="main" class=" pt-16 px-28">
        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">@yield('title_page') </span>  - Statistic
        </h2>


        <form class="max-w-md mx-2 my-5" action="/dashboard">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="query" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>


        <section class="overview bg-white dark:bg-gray-800">
            <div class="flex space-x-4 flex-wrap p-4">
                <div class="w-full md:w-1/2 xl:w-1/4 mb-4">
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class="mb-2 text-gray-700 dark:text-gray-300">Total product</p>
                                    <div class="mt-4">
                                        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-100">76%</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>57%</strong> Completed</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full">
                                    <img src="img/project-icon-4.svg" alt="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 mb-4">
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class="mb-2 text-gray-700 dark:text-gray-300">Total Users</p>
                                    <div class="mt-4">
                                        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-100">76%</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>57%</strong> Completed</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full">
                                    <img src="img/project-icon-4.svg" alt="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 mb-4">
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class="mb-2 text-gray-700 dark:text-gray-300">Total Categorie</p>
                                    <div class="mt-4">
                                        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-100">76%</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>57%</strong> Completed</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full">
                                    <img src="img/project-icon-4.svg" alt="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/5 mb-4">
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class="mb-2 text-gray-700 dark:text-gray-300">Total Sales</p>
                                    <div class="mt-4">
                                        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-100">76%</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>57%</strong> Completed</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full">
                                    <img src="img/project-icon-4.svg" alt="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">@yield('title_page') </span>  - products
        </h2>

        <div class="w-full py-2 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">name</th>
                            <th class="px-4 py-3">description</th>
                            <th class="px-4 py-3">price</th>
                            <th class="px-4 py-3">Create_at</th>
                            <th class="px-4 py-3">image</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">


                            @foreach ($products as $product )

                                <tr class="text-gray-700 dark:text-gray-400">

                                    <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-500 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{$product->id}}
                                    </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$product->name}}
                                    </span>

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$product->description}}
                                    </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$product->price}}
                                    </span>

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$product->created_at}}
                                    </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <img src="storage/images/products/{{$product->image}}" width="55px">
                                    </td>

                                </tr>
                            @endforeach
                    </tbody>
                    <div class="my-2">
                        {{ $products->links() }}
                    </div>
                </table>
            </div>

        </div>
    </main>
@endsection

