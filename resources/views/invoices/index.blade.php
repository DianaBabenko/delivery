@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="rounded">
                    <div class="header-div row justify-content-center shadow-sm radius-div">
                        <h2 class="text-dark">Мої накладні</h2>
                    </div>
                    <div class="card-body main-div radius-div">
                        <div class="row justify-content-end mr-3 mb-2">
                            <h4>Створити накладну</h4>
                            <div class="ml-2">
                                <span class="border border-dark rounded pb-1" style="padding: 1px 2px">
                                    <a href="{{ route('invoices.create')}}">
                                        <img src="https://img.icons8.com/android/20/000000/plus.png"/>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Код</th>
                                <th>Одержувач</th>
                                <th>Адреса відправлення</th>
                                <th>Дата відправлення</th>
                                <th>Адреса доставки</th>
                                <th>Дата доставки</th>
                                <th>Тип доставки</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $count => $invoice)
                                @php /** @var \App\Models\Invoice $invoice */ @endphp
                                <tr>
                                    <td>{{++$count}}</td>

                                    <td>
                                        <a href="{{ route('invoices.show', $invoice->id) }}">
                                            {{ $invoice->code }}
                                        </a>
                                    </td>
                                    <td>{{ $invoice->recipient->name}} {{$invoice->recipient->surname}} {{ $invoice->recipient->patronymic}}</td>
                                    <td>{{ $invoice->from_department->name }}</td>
                                    <td>{{ optional($invoice->departure_date)->format('d M Y') }}</td>
                                    <td>{{ $invoice->to_department->name }}</td>
                                    <td>{{ optional($invoice->delivery_date)->format('d M Y') }}</td>
                                    <td>{{ $invoice->delivery_type->name }}</td>
                                    <td>
                                        <div class="border border-dark rounded">
                                            <a href="{{ route('invoices.edit', $invoice->id) }}">
                                                <img src="https://img.icons8.com/windows/25/000000/edit.png"/>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('invoices.destroy', $invoice->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-danger" style="padding: 3.5px 8px">X
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($invoices->total() > $invoices->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $invoices->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
