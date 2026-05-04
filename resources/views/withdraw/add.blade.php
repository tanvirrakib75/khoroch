@extends('layouts.master')
@section('content')
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
                <input class="flex-grow" type="text" placeholder="bKash/Nagad/Bank/Rocket Name" name="withdraw_from"
                    value="{{ old('withdraw_from')}}" tabindex="0" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title"> Account Number <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="From Account Number" name="account_number"
                    value="{{ old('account_number')}}" tabindex="0" aria-required="true" required="">
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