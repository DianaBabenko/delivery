@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="w-full col-11">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div">
                        <h3 class="mt-1">Інформація про нас</h3>
                    </div>
                    <div class="card-body  main-div  radius-div">
                        <div class="row ">
                            <div class="">
                                <div>
                                    <h4 class="row justify-content-center">Відділення</h4>
                                    <div class="row justify-content-center">
                                        @foreach($departments as $department)
                                            @php /** @var \App\Models\Department $department */ @endphp
                                            <div class="ml-2 row w-full pr-2 col-5 mr-3 info-card__div-small">
                                                <div class="my-2 col">
                                                    <span>{{$department->name}}</span>
                                                    <span>{{$department->address}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <h4 class="row justify-content-center mt-3">Типи доставок</h4>
                                    <div class="row justify-content-center">
                                        @foreach($deliveryTypes as $deliveryType)
                                            @php /** @var \App\Models\DeliveryType $deliveryType */ @endphp
                                            <div class="ml-2 row w-full col-3 mr-3 px-4 info-card__div-small">
                                                <div class="my-2 row ml-1">
                                                    <div class="mr-2">{{$deliveryType->name}}:</div>
                                                    <div>{{$deliveryType->cost}} грн</div>
                                                </div>
                                            </div>
                                            @endforeach
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
