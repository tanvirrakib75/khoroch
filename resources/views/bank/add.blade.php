@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Income infomation</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li>
                <a href="#">
                    <div class="text-tiny">Dashboard</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <a href="#">
                    <div class="text-tiny">Income</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">New Income</div>
            </li>
        </ul>
    </div>
    <!-- new-category -->
    <div class="wg-box">
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        <form class="form-new-product form-style-1" action="{{ route('bank.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Bank Name <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Bank Name" name="bank_name" value="{{ old('bank_name')}}" tabindex="0"
                    value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Bank Account Number  <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Bank account number" name="bank_account_number"
                   value="{{ old('bank_account_number')}}" tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Current Balance <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Current Balance" name="current_balance" value="{{ old('current_balance')}}" tabindex="0"
                    value="" aria-required="true" required="">
            </fieldset>
            <div class="bot">
                <div></div>
                <button class="tf-button w208" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection