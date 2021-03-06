@extends('webmaster.layouts.master')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('webmaster.subjects.index') }}">دپارتمان ها</a></li>
    <li class="breadcrumb-item"><a href="#">نمایش دپارتمان</a></li>
@endsection

@section('page-title')
    نمایش دپارتمان
@endsection

@section('content')
    <div class="col-10 mx-auto">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <p class="h3 mx-auto text-center">اطلاعات پایه</p>
                    <hr>
                    <div class="col-6">
                        <p>عنوان : {{ $subject->title }}</p>
                    </div>
                    <div class="col-6">
                        <p>وضعیت دپارتمان : @if ($subject->active)
                            <span class="badge bg-green">فعال</span> @else <span class="badge bg-warning">غیر فعال</span>
                            @endif
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
