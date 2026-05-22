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
                <div class="text-tiny">All Bank Information</div>
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
            
            <button type="button" class="tf-button style-1 w208" data-bs-toggle="modal" data-bs-target="#bankModal">
                Add New
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bank Name</th>
                        <th>Bank Account Number</th>
                        <th>Current Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->bank_name }}</td>
                        <td>{{ $data->bank_account_number }}</td>
                        <td>{{ $data->current_balance }}</td>
                        <td>
                            <div class="list-icon-function">
                                <a href="#" target="_blank">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                </a>
                                <a href="{{ route('bank.edit',$data->id) }}">
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


<!-- Add Modal Start From Here  -->

<div class="modal fade" id="bankModal" tabindex="-1" aria-labelledby="bankModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankModalLabel">Add New Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="form-new-product form-style-1" action="{{ route('bank.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name mt-2">
                    <div class="body-title">Wallet Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="bKash/Nagad/Bank/Rocket Name" name="bank_name"
                        value="{{ old('bank_name')}}" tabindex="0" value="" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Wallet Number <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Wallet number" name="bank_account_number"
                        value="{{ old('bank_account_number')}}" tabindex="0" value="" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Current Balance <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Current Balance" name="current_balance"
                        value="{{ old('current_balance')}}" tabindex="0" value="" aria-required="true" required="">
                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.modal-backdrop {
    display: none !important;
    /* এটি বুটস্ট্র্যাপের সেই কালো পর্দাটি মুছে দেবে */
}

.modal {
    background: rgba(0, 0, 0, 0.5);
    /* মোডাল ওপেন হলে পুরো স্ক্রিনে হালকা কালো শেড আসবে */
}

.modal-content {
    padding: 10px 20px !important;
}

.modal-dialog {
    max-width: 60% !important;
}

.modal-header {
    padding: 1rem 0rem;
}
</style>
@endsection