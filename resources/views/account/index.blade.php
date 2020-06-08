@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\User $user */ @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="col-md-12">
                    <div class="header-div row justify-content-center shadow-sm radius-div">
                        <h2 class="text-dark">Персональні дані</h2>
                    </div>
                    <div class="card-body main-div radius-div">
                        <div class="row justify-content-end mr-3 mb-2">
                            <h4>Редагувати дані</h4>
                            <div class="ml-2">
                                <span class="border border-dark rounded pb-1">
                                    <a href="{{ route('account.edit', [$user->id]) }}">
                                        <img src="https://img.icons8.com/windows/25/000000/edit.png"/>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-center ">
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>Ім'я: {{$user->name}}</h5>
                            </div>
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>Прізвище: {{$user->surname}}</h5>
                            </div>
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>По-батькові: {{$user->patronymic}}</h5>
                            </div>
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>Телефон: {{$user->phone}}</h5>
                            </div>
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>Адреса: {{$user->address}}</h5>
                            </div>
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>Email: {{$user->email}}</h5>
                            </div>
                            <div class="info-card__div radius-div col-5 mb-3 mr-3">
                                <h5>День народження: {{optional($user->birthday)->format('d-m-Y')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
