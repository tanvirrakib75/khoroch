@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Income infomation</h3>
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
                <a href="{{ route('bank') }}">
                    <div class="text-tiny">Wallet</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">Edit Wallet</div>
            </li>
        </ul>
    </div>
    <!-- new-category -->
    <div class="wg-box">
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        <form class="form-new-product form-style-1" action="{{ route('bank.update',$data->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Wallet Name <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="bKash/Nagad/Rocket/Bank" name="bank_name" value="{{ old('bank_name',$data->bank_name) }}" tabindex="0"
                    value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Wallet Number  <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Wallet number" name="bank_account_number"
                 value="{{ old('bank_account_number',$data->bank_account_number) }}"  tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Current Balance <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Current Balance" name="current_balance" value="{{ old('current_balance',$data->current_balance) }}" tabindex="0"
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