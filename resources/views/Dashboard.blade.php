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
                </table>
            </div>

        </div>
    </main>
@endsection

