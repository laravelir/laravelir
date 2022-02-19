@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.users.index') }}">کاربران</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش کاربر</a></li>
@endsection

@section('page-title')
    نمایش کاربر
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p class="h3">اطلاعات پایه</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                        <p>نام کاربری : {{ $user->username }}</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                    </div>
                    <div class="col-6">
                        <p class="h3">اطلاعات پایه</p>
                        <p>ایمیل : {{ $user->email }}</p>
                        <p>نام کاربری : {{ $user->username }}</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                        <p>نام و نام خانوادگی : {{ $user->full_name }}</p>
                    </div>
                    <div class="col-12 my-5">
                        <h1>Invoice INV/001/15</h1>
                    </div>
                </div>
                <table class="table table-transparent table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 1%"></th>
                            <th>Product</th>
                            <th class="text-center" style="width: 1%">Qnt</th>
                            <th class="text-end" style="width: 1%">Unit</th>
                            <th class="text-end" style="width: 1%">Amount</th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            <p class="strong mb-1">Logo Creation</p>
                            <div class="text-muted">Logo and business cards design</div>
                        </td>
                        <td class="text-center">
                            1
                        </td>
                        <td class="text-end">$1.800,00</td>
                        <td class="text-end">$1.800,00</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>
                            <p class="strong mb-1">Online Store Design &amp; Development</p>
                            <div class="text-muted">Design/Development for all popular modern browsers</div>
                        </td>
                        <td class="text-center">
                            1
                        </td>
                        <td class="text-end">$20.000,00</td>
                        <td class="text-end">$20.000,00</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>
                            <p class="strong mb-1">App Design</p>
                            <div class="text-muted">Promotional mobile application</div>
                        </td>
                        <td class="text-center">
                            1
                        </td>
                        <td class="text-end">$3.200,00</td>
                        <td class="text-end">$3.200,00</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="strong text-end">Subtotal</td>
                        <td class="text-end">$25.000,00</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="strong text-end">Vat Rate</td>
                        <td class="text-end">20%</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="strong text-end">Vat Due</td>
                        <td class="text-end">$5.000,00</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                        <td class="font-weight-bold text-end">$30.000,00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
