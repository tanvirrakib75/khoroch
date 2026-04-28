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
                <a href="{{ route('income.add') }}">
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
        <form class="form-new-product form-style-1" action="{{ route('income.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Income Name <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Income Name" name="income_name" tabindex="0"
                    value="{{ old('income_name') }}" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Income Description <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Income Description" name="income_description"
                   value="{{ old('income_description') }}" tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Income Amount <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Income Amount" name="amount" value="{{ old('amount') }}" tabindex="0"
                    value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="brand">
                <div class="body-title mb-10">Income Category <span class="tf-color-1">*</span>
                </div>
                <div class="select">
                    <select class="" name="income_category_id" value="{{ old('income_category_id') }}">
                        @foreach($income_category as $incomeCate)
                        <option value="{{ $incomeCate->id }}">{{ $incomeCate->income_category }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Income date <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="date" placeholder="Income name" name="date" value="{{ old('date') }}" tabindex="0" value=""
                    aria-required="true" required="">
            </fieldset>

            <div class="bot">
                <div></div>
                <button class="tf-button w208" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection