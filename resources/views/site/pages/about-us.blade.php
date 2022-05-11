@extends('site.layouts.master')

@section('page-title')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('site.posts.index') }}">توسعه دهنگان</a></li>
    {{-- <li class="breadcrumb-item active"><a href="#">توسعه دهنگان</a></li> --}}
@endsection


@section('content')
<div class="col-lg-9 mx-auto">
    <div class="card card-lg">
      <div class="card-body">
        <div class="markdown">
          <div>
            <div class="d-flex mb-3">
              <h1 class="m-0">تغییرات سامانه</h1>
            </div>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta2</span> –
              <span class="text-muted">March 29, 2021</span>
            </div>
            <ul>
              <li>update dependencies</li>
              <li><code class="language-plaintext highlighter-rouge">li</code> marker fix</li>
              <li>page wrapper, nav fixes</li>
              <li>scripts optimize, remove <code class="language-plaintext highlighter-rouge">capture_once</code></li>
              <li><code class="language-plaintext highlighter-rouge">page-body</code> fixes</li>
              <li>layout navbar fix</li>
              <li>typography fix</li>
              <li>ribbon fix</li>
              <li>charts label fixes</li>
              <li>charts docs</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta</span> –
              <span class="text-muted">February 17, 2021</span>
            </div>
            <p class="strong">Initial beta release of Tabler v1.0! Lots more coming soon though 😁</p>
            <ul>
              <li>update Bootstrap to 5.0.0-beta2</li>
              <li>update other dependencies.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
