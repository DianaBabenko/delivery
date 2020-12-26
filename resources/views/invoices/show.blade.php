@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Invoice $invoice */ @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="col-md-12">
                    <div class="header-div row justify-content-center shadow-sm radius-div">
                        <div class="">
                            <h4 class="mt-1">Накладна № {{$invoice->code}}</h4>
                        </div>
                    </div>
                    <div class="card-body main-div radius-div">
                        <div class="ml-2">
                            <div>
                                <div class="row ml-3 mt-2">
                                    <h3>Посилки</h3>
                                    <div class="ml-2 mt-1">
                                        <span class="border border-dark rounded pb-1" style="padding: 1px 2px">
                                            <a href="{{ route('invoices.parcels.create', [$invoice->id])}}">
                                                <img src="https://img.icons8.com/android/20/000000/plus.png"/>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                @if ($parcels->isNotEmpty())
                                    <div class="row ml-3">
                                        <div>Всього посилок: {{$parcels->count()}} </div>
                                        <div class="ml-4">Оголошена вартість посилок: {{$invoice->price}} грн</div>
                                    </div>
                                    <div class="row w-full">
                                    @foreach($parcels as $count => $parcel)
                                    <div class="row ml-3 mr-3 mt-3">
                                        <div class="ml-2 row w-full col-10 mr-5">
                                            <div class="row pl-3 mb-3">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="mr-4 info-card__div-small">Вага: {{$parcel->weight}} кг</div>
                                                        <div class="mr-4 info-card__div-small">Довжина: {{$parcel->length}} см</div>
                                                        <div class="mr-4 info-card__div-small">Ширина: {{$parcel->width}} см</div>
                                                        <div class="mr-4 info-card__div-small">Висота: {{$parcel->height}} см</div>
                                                        <div class="mr-4 info-card__div-small">Об'єм: {{$parcel->volume}} см<sup>3</sup></div>
                                                        <div class="mr-4 info-card__div-small">Вартість: {{$parcel->cost}} грн</div>
                                                    </div>
                                                    <div class="row mt-1">
                                                        <span>Опис: {{$parcel->description}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-1 ml-3">
                                            <span class="border border-dark rounded pb-1">
                                                <a href="{{ route('invoices.parcels.edit', [$parcel->invoice_id, $parcel->id]) }}">
                                                    <img src="https://img.icons8.com/windows/25/000000/edit.png"/>
                                                </a>
                                            </span>
                                            </div>
                                            <div class="mt-1 ml-3">
                                                <form method="POST" action="{{ route('invoices.parcels.destroy', [$parcel->invoice_id, $parcel->id]) }}">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button type="submit" class="btn btn-sm btn-outline-danger border-danger">X
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="ml-4">Відправлень поки не має</div>
                                @endif
                            </div>
                            <div class="row m-3 justify-content-center">
                                <div class="flex-column mr-5">
                                    <div class="row">
                                        <h3>Відправник</h3>
                                        <div class="ml-2 mt-1">
                                            <span class="border border-dark rounded pb-1">
                                                <a href="{{ route('account.edit', [$invoice->sender_id]) }}">
                                                    <img src="https://img.icons8.com/windows/25/000000/edit.png"/>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <div class="">
                                            <div class="mr-4">Ім'я: {{$invoice->sender->name}}</div>
                                            <div class="mr-4">Фамілія: {{$invoice->sender->surname}}</div>
                                            <div class="mr-4">По-батькові: {{$invoice->sender->patronymic}}</div>
                                            <div class="mr-4">Телефон: {{$invoice->sender->phone}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-column">
                                    <div class="row">
                                        <h3>Одержувач</h3>
                                        <div class="ml-2 mt-1">
                                            <span class="border border-dark rounded pb-1">
                                            <a href="{{ route('invoices.edit', $invoice->id) }}">
                                                <img src="https://img.icons8.com/windows/25/000000/edit.png"/>
                                            </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="mr-4">Ім'я: {{$invoice->recipient->name}}</div>
                                            <div class="mr-4">Фамілія: {{$invoice->recipient->surname}}</div>
                                            <div class="mr-4">По-батькові: {{$invoice->recipient->patronymic}}</div>
                                            <div class="mr-4">Телефон: {{$invoice->recipient->phone}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="row justify-content-center">
                                    <h3 class="ml-3">Основна інформація</h3>
                                    <div class="ml-2 mt-1">
                                        <span class="border border-dark rounded pb-1">
                                            <a href="{{ route('invoices.edit', $invoice->id) }}">
                                                <img src="https://img.icons8.com/windows/25/000000/edit.png"/>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="row justify-content-center ml-3 mr-3">
                                    <div class="mr-4 info-card__div-small">Адреса відправлення: {{$invoice->from_department->name}}</div>
                                    <div class="mr-4 info-card__div-small">Дата відправлення: {{optional($invoice->departure_date)->format('d M Y')}}</div>
                                    <div class="mr-4 info-card__div-small">Адреса доставки: {{$invoice->to_department->name}}</div>
                                    <div class="mr-4 info-card__div-small">Дата доставки: {{optional($invoice->delivery_date)->format('d M Y')}}</div>
                                    <div class="mr-4 info-card__div-small">Тип доставки: {{$invoice->delivery_type->name}}</div>
                                    <div class="mr-4 info-card__div-small">Вартість доставки: {{$invoice->delivery_type->cost}} грн</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
