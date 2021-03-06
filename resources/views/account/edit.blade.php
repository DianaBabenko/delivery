@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\User $user */ @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <form method="POST" action="{{ route('account.update', [$user->id]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="col-md-12">
                        <div class="header-div row justify-content-center shadow-sm radius-div">
                            <div class="">
                                <h3 class="mt-1">Редагування даних</h3>
                            </div>
                        </div>
                        <div class="card-body  main-div  radius-div">
                            <div class="row w-full justify-content-center">
                                <div class="form-group col-3">
                                    <label for="name" class="ml-2">Ім'я</label>
                                    <input name="name" value="{{ $user->name }}"
                                           id="name"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="surname" class="ml-2">Прізвище</label>
                                    <input name="surname" value="{{ $user->surname }}"
                                           id="surname"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="patronymic" class="ml-2">По-батькові</label>
                                    <input name="patronymic" value="{{ $user->patronymic }}"
                                           id="patronymic"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="phone" class="ml-2">Телефон</label>
                                    <input name="phone" value="{{ $user->phone }}"
                                           id="phone"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-5">
                                    <label for="address" class="ml-2">Адреса</label>
                                    <input name="address" value="{{ $user->address }}"
                                           id="address"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="birthday" class="ml-2">Дата народження</label>
                                    <input name="birthday" value="{{ optional($user->birthday)->format('Y-m-d') }}"
                                           id="birthday"
                                           type="date"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="email" class="ml-2">Email</label>
                                    <input name="email" value="{{ $user->email }}"
                                           id="email"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-outline-info field-input__div">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
