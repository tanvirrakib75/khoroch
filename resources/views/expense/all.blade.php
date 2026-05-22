@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>All Expense</h3>
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
                <div class="text-tiny">All Expense</div>
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
                Add New Expense
            </button>
            <button type="button" class="tf-button style-1 w208" data-bs-toggle="modal" data-bs-target="#exampleModalTwo">
                Add Expense Category
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Expense Name</th>
                        <th>Expense Description</th>
                        <th>Expense Amount</th>
                        <th>Expense Category</th>
                        <th>Expense Date</th>
                    </tr>
                </thead>
                @foreach($expense as $data)
                <tbody>

                    <tr>

                        <td>{{ $data->id }}</td>
                        <td>{{ $data->expense_name }}</td>
                        <td>{{ $data->expense_description }}</td>
                        <td>{{ $data->expense_amount }}</td>
                        <td>{{ $data->categories->expense_category}}</td>
                        <td>{{ $data->expense_date}}</td>
                        <td>
                            <div class="list-icon-function">
                                <a href="#" target="_blank">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                </a>
                                <a href="{{ route('expense.edit',$data->id) }}">
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

                </tbody>
                @endforeach
            </table>
        </div>

        <div class="divider"></div>
        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


        </div>
    </div>
</div>




<!-- Expense add modal start from here  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="main-content-wrap">
                    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                        <h3>Expense infomation</h3>
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
                                <a href="{{ route('expense') }}">
                                    <div class="text-tiny">Expense</div>
                                </a>
                            </li>
                            <li>
                                <i class="icon-chevron-right"></i>
                            </li>
                            <li>
                                <div class="text-tiny">New Expense</div>
                            </li>
                        </ul>
                    </div>
                    <!-- new-category -->
                    <div class="wg-box">
                        @if(session('success'))
                        <div>{{ session('success') }}</div>
                        @endif
                        <form class="form-new-product form-style-1" action="{{route('expense.store')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset class="name">
                                <div class="body-title">Expense Name <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Expense Name" name="expense_name"
                                    value="{{ old('expense_name') }}" tabindex="0" value="" aria-required="true"
                                    required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title">Expense Description <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Expense Description"
                                    name="expense_description" value="{{ old('expense_description') }}" tabindex="0"
                                    value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title">Expense Amount <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Expense Amount" name="expense_amount"
                                    value="{{ old('expense_amount') }}" tabindex="0" value="" aria-required="true"
                                    required="">
                            </fieldset>
                            <fieldset class="brand">
                                <div class="body-title mb-10">Expense Category <span class="tf-color-1">*</span>
                                </div>
                                <div class="select">
                                    <select class="" name="expense_category_id"
                                        value="{{ old('expense_category_id') }}">
                                        @foreach($category as $category)
                                        <option value='{{ $category->id }}'>{{$category->expense_category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title">Expense date <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="date" placeholder="Brand name" name="expense_date"
                                    value="{{ old('expense_date') }}" tabindex="0" value="" aria-required="true"
                                    required="">
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
            </div>
        </div>
    </div>
</div>




<!-- Expense Category modal start from here  -->

<div class="modal fade" id="exampleModalTwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="main-content-wrap">
                    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                        <h3>Category infomation</h3>
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
                                <a href="{{ route('expense.category') }}">
                                    <div class="text-tiny">Categories</div>
                                </a>
                            </li>
                            <li>
                                <i class="icon-chevron-right"></i>
                            </li>
                            <li>
                                <div class="text-tiny">New Category</div>
                            </li>
                        </ul>
                    </div>
                    <!-- new-category -->
                    <div class="wg-box">
                        @if(session('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                        @endif
                        <form class="form-new-product form-style-1" action="{{ route('expense.category.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="name">
                                <div class="body-title">Category Name <span class="tf-color-1">*</span>
                                </div>
                                <input class="flex-grow" type="text" placeholder="Category name" name="expense_category"
                                    tabindex="0" value="" aria-required="true" required="">
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
            </div>
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