@extends('layouts.master')

@section('title')
    Users management
@endsection


@section('content')
    <main id="main" class=" pt-16 px-28">
        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">Users</span> - Management
        </h2>
        <a href="{{route('create.user')}}"
           class="px-4 py-2 my-2 bg-orange rounded  text-white hover:bg-primary-100 focus:outline-none transition-colors">
            Add a user
        </a>
        @if(session("success"))
            <div class="flex items-center p-4 mt-3 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success alert!</span>
                </div>
            </div>
        @endif


        <div class="w-full py-2 overflow-hidden rounded-lg shadow-xs my-2">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">name</th>
                        <th class="px-4 py-3">description</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">action</th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($users as $user )
                        <tr class="text-gray-700 dark:text-gray-400">

                            <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-500 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{$user->id}}
                                    </span>
                            </td>
                            <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$user->name}}
                                    </span>

                            </td>
                            <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$user->email}}
                                    </span>

                            </td>
                            <td class="px-4 py-3 text-xs">

                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full">
                                        {{$user->role_id}}
                                    </span>

                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href='user/edit/{{$user->id}}' method="post">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>

                                    <form action="{{route('user.delete',['user' => $user])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit"
                                                onclick="return confirm('Do you really want to Delete ?');"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
