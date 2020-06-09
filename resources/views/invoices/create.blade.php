@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <form method="POST" action="{{ route('invoices.store') }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="header-div row justify-content-center shadow-sm radius-div">
                            <h3>Створення накладної</h3>
                        </div>
                        <div class="card-body main-div radius-div">
                            <div>
                                <div>
                                    <h3 class="text-center">Основна інформація</h3>

                                    <div class="row justify-content-center">
                                        <div class="form-group col-5">
                                            <label for="departure_date" class="ml-2">Дата відправлення</label>
                                            <input name="departure_date" value="<?php echo date("Y-m-d");?>"
                                                   id="departure_date"
                                                   type="date"
                                                   class="form-control"
                                                   required
                                            >
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="from_department_id" class="ml-2">Адреса відправлення</label>
                                            <select name="from_department_id"
                                                    id="from_department_id"
                                                    class="form-control"
                                                    required
                                            >
                                                @foreach($departments as $department){
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="to_department_id" class="ml-2">Адреса доставки</label>
                                            <select name="to_department_id"
                                                    id="to_department_id"
                                                    class="form-control"
                                                    required
                                            >
                                                @foreach($departments as $department){
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="delivery_type_id" class="ml-2">Тип доставки</label>
                                            <select name="delivery_type_id"
                                                    id="delivery_type_id"
                                                    class="form-control"
                                                    required
                                            >
                                                @foreach($deliveries as $delivery_type){
                                                <option value="{{$delivery_type->id}}">{{$delivery_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-center mt-3">Одержувач</h3>
                                    <div class="row justify-content-center">
                                        <div class="form-group col-5">
                                            <label for="name" class="ml-2">Ім'я</label>
                                            <input name="name" value="{{ $recipient->name }}"
                                                   id="name"
                                                   type="text"
                                                   class="form-control"
                                                   required
                                            >
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="surname" class="ml-2">Прізвище</label>
                                            <input name="surname" value="{{ $recipient->surname }}"
                                                   id="surname"
                                                   type="text"
                                                   class="form-control"
                                                   required
                                            >
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="patronymic" class="ml-2">По-батькові</label>
                                            <input name="patronymic" value="{{ $recipient->patronymic }}"
                                                   id="patronymic"
                                                   type="text"
                                                   class="form-control"
                                                   required
                                            >
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="phone" class="ml-2">Телефон</label>
                                            <input name="phone" value="{{ $recipient->phone }}"
                                                   id="phone"
                                                   type="text"
                                                   class="form-control"
                                                   required
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-outline-info field-input__div">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
