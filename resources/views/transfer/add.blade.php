@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Transfer</h3>
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
                <a href="{{ route('transfer') }}">
                    <div class="text-tiny">Transfer</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">New Transfer</div>
            </li>
        </ul>
    </div>
    <!-- new-category -->
    <div class="wg-box">
        <div class="d-flex justify-content-end">
            <a class="tf-button style-1 w208" href="{{ route('transfer') }}">
                <i class="icon-plus"></i> All Transfer
            </a>
        </div>
        @if(session('success'))
        <div>{{ session('success') }}</div>
        @endif
        <form class="form-new-product form-style-1" action="{{ route('transfer.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title"> From Account <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="bKash/Nagad/Bank/Rocket Name" name="from_account"
                    value="{{ old('from_account')}}" tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> From Account Number <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="From Account Number" name="from_account_number"
                    value="{{ old('from_account_number')}}" tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> To Account <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="To Account" name="to_account"
                    value="{{ old('to_account')}}" tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> To Account Number<span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="To Account Number" name="to_account_number"
                    value="{{ old('to_account_number')}}" tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> Transfer Type <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Transfer Type" name="transfer_type"
                    value="{{ old('transfer_type')}}" tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> Amount <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Amount" name="amount" value="{{ old('amount')}}"
                    tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> Charge <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Charge" name="charge" value="{{ old('charge')}}"
                    tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> Date <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="Date" placeholder="Charge" name="date" value="{{ old('date')}}"
                    tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> Note <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Note" name="note" value="{{ old('note')}}"
                    tabindex="0" aria-required="true" required="">
            </fieldset>
            <div class="bot">
                <div></div>
                <button class="tf-button w208" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection