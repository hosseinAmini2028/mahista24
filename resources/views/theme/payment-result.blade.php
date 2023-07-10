@extends('theme.layouts.master')

@section('title', 'نتیجه تراکنش')

@section('content')
    <section class="container pt-5 mt-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-sm-2">
            <h1 class="h2 me-3 mb-sm-0">نتیجه تراکنش</h1>
        </div>

        <div class="text-nowrap">
            {{ $messages }}
        </div>
    </section>
@endsection