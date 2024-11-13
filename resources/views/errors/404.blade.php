@extends('site.layouts.app')

@section('title', 'page-not-found')


@section('content')


    <section class="error-page">
        <div class="container">

            <div class="error-page-inner py-100">
                <h1>404 ERROR</h1>
                <p>OPPS!PAGE NOT FOUND</p>
                <div class="error-btn text-center mt-4">
                    <a href="{{ URL::to('/') }}">Back Home</a>
                </div>
            </div>
        </div>
    </section>

@endsection
