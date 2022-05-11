@extends('site.layouts.master')

@section('page-title')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('site.pages.faqs') }}">سوالات متداول</a></li>
@endsection

@section('content')
    <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">
                <div class="space-y-4">
                    @foreach ($groups as $item)
                        <div>
                            <h2 class="mb-3">{{ $item->title }}</h2>
                            <div id="faq-1" class="accordion" role="tablist" aria-multiselectable="true">
                                <div class="accordion-item">
                                    <div class="accordion-header" role="tab">
                                        <button class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-1-1">Welcome to our service!</button>
                                    </div>
                                    <div id="faq-1-1" class="accordion-collapse collapse show" role="tabpanel"
                                        data-bs-parent="#faq-1">
                                        <div class="accordion-body pt-0">
                                            <div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                    alias dignissimos dolorum ea est eveniet, excepturi illum in iste iure
                                                    maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo, ipsa?
                                                </p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                    alias dignissimos dolorum ea est eveniet, excepturi illum in iste iure
                                                    maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo, ipsa?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
