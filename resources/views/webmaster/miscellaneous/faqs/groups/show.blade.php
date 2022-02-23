@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.faq-groups.index') }}">گروه سوال متداول</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش گروه متداول</a></li>
@endsection

@section('page-title')
    نمایش گروه متداول
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $faqGroup->title }}</p>
                    </div>
                    <div class="col-6">
                        <p>وضعیت : @if ($faqGroup->active)
                            <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر
                                    فعال</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
