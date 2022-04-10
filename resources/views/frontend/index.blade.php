

@extends('frontend.frontend_master')


@section('content')


<div>
    @include('frontend.navbar')
</div>

<div>
    @include('frontend.slider')
</div>

<div>
    @include('frontend.products')
</div>

<div>
    @include('frontend.banner')
</div>

<div>
    @include('frontend.footer')
</div>

@endsection