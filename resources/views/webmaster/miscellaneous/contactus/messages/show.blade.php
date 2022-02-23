@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.contacts.index') }}">پیام تماس با ما</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش پیام تماس با ما</a></li>
@endsection

@section('page-title')
    نمایش پیام تماس با ما
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>کاربر : {{ $contact->name }}</p>
                        <p>ایمیل : {{ $contact->email }}</p>
                    </div>
                    <div class="col-6">
                        <p>دپارتمان : {{ $contact->subject->title }}</p>
                        <p>موبایل : {{ $contact->mobile ?? '--- ' }}</p>
                        <p>پیام : {{ $contact->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
