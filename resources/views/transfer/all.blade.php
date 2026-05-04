@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>All Wallet Information</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li>
                <a href="{{route('home')}}">
                    <div class="text-tiny">Dashboard</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">All Wallet Information</div>
            </li>
        </ul>
    </div>

    <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
            <div class="wg-filter flex-grow">
                <form class="form-search">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                            aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            <a class="tf-button style-1 w208" href="{{ route('transfer.add') }}"><i class="icon-plus"></i>Add Transfer</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>From Account</th>
                        <th>From Account Number</th>
                        <th>To Account</th>
                        <th>To Account Number</th>
                        <th>Amount</th>
                        <th>Charge</th>
                        <th>Transfer Type</th>
                        <th>Date</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transfer as $data)
                    <tr>
                        <td>{{ $data->from_account }}</td>
                        <td>{{ $data->from_account_number }}</td>
                        <td>{{ $data->to_account }}</td>
                        <td>{{ $data->to_account_number }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->charge }}</td>
                        <td>{{ $data->transfer_type }}</td>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->note }}</td>
                        <td>
                            <div class="list-icon-function">
                                <a href="#" target="_blank">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                </a>
                                <form action="#" method="POST">
                                    <div class="item text-danger delete">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>

        <div class="divider"></div>
        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


        </div>
    </div>
</div>
@endsection