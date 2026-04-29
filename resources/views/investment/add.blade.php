@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Investment infomation</h3>
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
                <a href="{{ route('investment.add') }}">
                    <div class="text-tiny">Investment</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">New Investment</div>
            </li>
        </ul>
    </div>
    <!-- new-category -->
    <div class="wg-box">
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        <form class="form-new-product form-style-1" action="{{ route('investment.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Bank Name <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Bank Name" name="bank_name" tabindex="0"
                    value="{{ old('bank_name') }}" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Investment Amount <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="number" placeholder="Investment Amount" name="invest_amount"
                   value="{{ old('invest_amount') }}" tabindex="0" value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Return Amount <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="number" placeholder="Return Amount" name="return_amount" value="{{ old('return_amount') }}" tabindex="0"
                    value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Note <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Note" name="note" value="{{ old('note') }}" tabindex="0"
                    value="" aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
            <div class="body-title">Investment Status <span class="tf-color-1">*</span></div>
            <div class="select flex-grow">
                <select name="status" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (Running)</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed (Settled)</option>
                </select>
            </div>
</fieldset>
            <fieldset class="name">
                <div class="body-title">Investment date <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="date" placeholder="Income name" name="invest_date" value="{{ old('invest_date') }}" tabindex="0" value=""
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