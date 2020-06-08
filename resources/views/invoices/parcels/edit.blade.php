@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Parcel $parcel */ @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <form method="POST" action="{{ route('invoices.parcels.update', ['invoice' => $invoice->id, 'parcel' => $parcel->id]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="col-md-12">
                        <div class="header-div row justify-content-center shadow-sm radius-div">
                            <div class="">
                                <h4 class="mt-1">Редагування відправлення</h4>
                            </div>
                        </div>
                        <div class="card-body main-div radius-div">
                            <div class="row w-full ml-1 justify-content-center">
                                <div class="form-group col-2">
                                    <label for="weight">Вага, кг</label>
                                    <input name="weight" value="{{ $parcel->weight }}"
                                           id="weight"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                </div>
                                <div class="form-group col-2">
                                    <label for="length">Довжина, см</label>
                                    <input name="length" value="{{ $parcel->length }}"
                                           id="length"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                </div>
                                <div class="form-group col-2">
                                    <label for="width">Ширина, см</label>
                                    <input name="width" value="{{ $parcel->width }}"
                                           id="width"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                </div>
                                <div class="form-group col-2">
                                    <label for="height">Висота, см</label>
                                    <input name="height" value="{{ $parcel->height }}"
                                           id="height"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                </div>
                                <div class="form-group col-2">
                                    <label for="cost">Вартість, грн</label>
                                    <input name="cost" value="{{ $parcel->cost }}"
                                           id="cost"
                                           type="text"
                                           class="form-control"
                                           required
                                    >
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="description" class="ml-3">Опис</label>
                                    <textarea name="description"
                                           id="description"
                                           class="form-control pl-3"
                                           rows="2"
                                           cols="3"
                                           required
                                    >{{ $parcel->description }}
                                    </textarea>
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
