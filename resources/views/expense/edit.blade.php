@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Edit Expense</h3>
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
                    <div class="text-tiny">Expense</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">Edit Expense</div>
            </li>
        </ul>
    </div>
    <!-- new-category -->
    <div class="wg-box">
        @if(session('success'))
        <div>{{ session('success') }}</div>
        @endif
        <form class="form-new-product form-style-1" action="{{route('expense.update',$expense->id)}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="name">
                <div class="body-title">Expense Name <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Expense Name" name="expense_name"
                    value="{{ old('expense_name',$expense->expense_name) }}" tabindex="0" value="" aria-required="true"
                    required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Expense Description <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Expense Description" name="expense_description"
                    value="{{ old('expense_description', $expense->expense_description) }}" tabindex="0" value=""
                    aria-required="true" required="">
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Expense Amount <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="text" placeholder="Expense Amount" name="expense_amount"
                    value="{{ old('expense_amount', $expense->expense_amount) }}" tabindex="0" value=""
                    aria-required="true" required="">
            </fieldset>
            <fieldset class="brand">
                <div class="body-title mb-10">Expense Category <span class="tf-color-1">*</span>
                </div>
                <div class="select">
                    <select class="" name="expense_category_id"
                        value="{{ old('expense_category_id', $expense->expense_category_id) }}">
                        @foreach($category as $category)
                        <option value='{{ $category->id }}'>{{$category->expense_category}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
            <fieldset class="name">
                <div class="body-title">Expense date <span class="tf-color-1">*</span></div>
                <input class="flex-grow" type="date" placeholder="Brand name" name="expense_date"
                    value="{{ old('expense_date', $expense->expense_date) }}" tabindex="0" value="" aria-required="true"
                    required="">
            </fieldset>

            <div class="bot">
                <div></div>
                <button class="tf-button w208" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection