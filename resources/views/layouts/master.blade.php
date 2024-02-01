<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.head')
</head>
<body class="bg-gray-300 dark:bg-gray-900">
    
    <!-- header bar -->
    @include('layouts.main-header')

    <!--  sidebar -->
    @include('layouts.main-sidebar')

    @yield('content')

</body>
@include('layouts.footer-script')
</html>
