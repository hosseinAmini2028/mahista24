<!DOCTYPE html>
<html lang="fa">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <title>@yield('title', config('app.name'))</title>

    @include('theme.layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">
   
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div><span>لطفا منتظر باشید</span>
        </div>
    </div>
    
    <main class="page-wrapper">
        
        @include('theme.layouts.header')
        
        @yield('content')
        
    </main>
    
    
    @include('theme.layouts.footer')


    @include('theme.layouts.script')
    
    @yield('script')

</body>
