@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.faqs.index') }}">سوال متداولان</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش سوال متداول</a></li>
@endsection

@section('page-title')
    نمایش سوال متداول
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>سوال : {{ $faq->qustion }}</p>
                        <p>وضعیت : @if ($faq->active)
                            <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-6">
                        <p>پاسخ : {{ $faq->answer }}</p>
                        <p>group : {{ $faq->group->title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
