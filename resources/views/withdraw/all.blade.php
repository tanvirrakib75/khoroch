@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>All Withdraw Information</h3>
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
                <div class="text-tiny">All Withdraw Information</div>
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
            <button type="button" class="tf-button style-1 w208" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Transfer
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Withdraw From</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                        <th>Charge</th>
                        <th>Date</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdraw as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->withdraw_from }}</td>
                        <td>{{ $data->account_number }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->charge }}</td>
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

<!-- Add Withdraw start from here  -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="main-content-wrap">
                    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                        <h3>Withdraw</h3>
                        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                            <li>
                                <a href="{{ route('home') }}">
                                    <div class="text-tiny">Dashboard</div>
                                </a>
                            </li>
                            <li>
                                <i class="icon-chevron-right"></i>
                            </li>
                            <li>
                                <a href="{{ route('withdraw') }}">
                                    <div class="text-tiny">All Withdraw</div>
                                </a>
                            </li>
                            <li>
                                <i class="icon-chevron-right"></i>
                            </li>
                            <li>
                                <div class="text-tiny">New Withdraw</div>
                            </li>
                        </ul>
                    </div>
                    <!-- new-category -->
                    <div class="wg-box">
                        <div class="d-flex justify-content-end">
                            <a class="tf-button style-1 w208" href="{{ route('withdraw') }}">
                                <i class="icon-plus"></i> All Withdraw
                            </a>
                        </div>
                        @if(session('success'))
                        <div>{{ session('success') }}</div>
                        @endif
                        <form class="form-new-product form-style-1" action="{{ route('withdraw.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset class="name">
                                <div class="body-title"> Withdraw From Account <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="bKash/Nagad/Bank/Rocket Name"
                                    name="withdraw_from" value="{{ old('withdraw_from')}}" tabindex="0"
                                    aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title"> Account Number <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="From Account Number"
                                    name="account_number" value="{{ old('account_number')}}" tabindex="0"
                                    aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title"> Amount <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Amount" name="amount"
                                    value="{{ old('amount')}}" tabindex="0" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title"> Charge <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Charge" name="charge"
                                    value="{{ old('charge')}}" tabindex="0" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title"> Date <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="Date" placeholder="Charge" name="date"
                                    value="{{ old('date')}}" tabindex="0" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title"> Note <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Note" name="note"
                                    value="{{ old('note')}}" tabindex="0" aria-required="true" required="">
                            </fieldset>
                            <div class="bot">
                                <div></div>
                                <button class="tf-button w208" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection