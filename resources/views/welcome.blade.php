@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content ">
            <div class="title m-b-md">
                <h1 class="text-info"></h1>
                <img src="{{ \URL::to('/img/logos.png') }}" alt="logo"/>
            </div>
        </div>
    </div>
@endsection

