@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Debt infomation</h3>
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
                <a href="{{ route('home') }}">
                    <div class="text-tiny">Debt</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">New Debt</div>
            </li>
        </ul>
    </div>
    <!-- new-category -->
    <div class="wg-box">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form class="form-new-product form-style-1" action="{{ route('debt.store') }}" method="POST">
            @csrf

            <fieldset class="name">
                <div class="body-title">Person Name <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Person name" name="person_name"
                    value="{{ old('person_name') }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title">Amount <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="number" step="0.01" placeholder="Enter amount" name="amount"
                    value="{{ old('amount') }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title">Transaction Type <span class="tf-color-1">*</span></div>
                <div class="select flex-grow">
                    <select name="type" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="take" {{ old('type') == 'take' ? 'selected' : '' }}>Take</option>
                        <option value="give" {{ old('type') == 'give' ? 'selected' : '' }}>Give</option>
                    </select>
                </div>
            </fieldset>

            <fieldset class="name">
                <div class="body-title">Note</div>
                <input class="flex-grow" type="text" placeholder="Short note" name="note" value="{{ old('note') }}">
            </fieldset>

            <fieldset class="name flex items-center gap-2">
                <div class="body-title">Is Paid?</div>
                <input type="checkbox" name="status" value="1" id="status" style="width: 20px; height: 20px;">
                <label for="status" class="cursor-pointer">Mark as Paid</label>
            </fieldset>
            <div class="bot">
                <div></div>
                <button class="tf-button w208" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection