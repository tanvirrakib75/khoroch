@extends('layouts.master')
@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>All Income</h3>
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
                <div class="text-tiny">All Income</div>
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
                Add New Income
            </button>
            <button type="button" class="tf-button style-1 w208" data-bs-toggle="modal" data-bs-target="#exampleModalTwo">
                Add Category
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Income Name</th>
                        <th>Income Description</th>
                        <th>Income Amount</th>
                        <th>Income Category</th>
                        <th>Income Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $income as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->income_name }}</td>
                        <td>{{ $data->income_description }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->categories->income_category }}</td>
                        <td>{{ $data->date }}</td>
                        <td>
                            <div class="list-icon-function">
                                <a href="#" target="_blank">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                </a>
                                <a href="{{ route('income.edit',$data->id) }}">
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

<!-- Add income start from here  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                            value="{{ old('income_description') }}" tabindex="0" value="" aria-required="true"
                            required="">
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Income Amount <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Income Amount" name="amount"
                            value="{{ old('amount') }}" tabindex="0" value="" aria-required="true" required="">
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
                        <input class="flex-grow" type="date" placeholder="Income name" name="date"
                            value="{{ old('date') }}" tabindex="0" value="" aria-required="true" required="">
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Category Modal start from here  -->
<div class="modal fade" id="exampleModalTwo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-new-product form-style-1" action="{{ route('income.category') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Category Name <span class="tf-color-1">*</span>
                        </div>
                        <input class="flex-grow" type="text" placeholder="Category name" name="income_category"
                            tabindex="0" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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