@extends('site.layouts.master')


@section('btn-list')
    <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">

        </div>
    </div>
@endsection

@section('page-title')
    مقاله خوب ما
@endsection

@section('styles')
    <style>
        .thumb-container {
            position: relative;
            color: white;
        }

        .thumb-title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="{{ route('site.posts.index') }}">پست ها</a></li>
    <li class="breadcrumb-item active"><a href="#">پست خوب ما</a></li>
@endsection

@section('content')
    <div class="row row-cards">
        <div class="col-lg-8">
            <div class="card card-lg">
                <div class="">
                    <img src="https://picsum.photos/536/354" class="img-thumbnail img-fluid w-100" alt=""
                        style="height: 350px!important;">

                    <div class="d-flex px-3 mt-3">
                        <div class="badge badge-outline bg-lime-lt mb-1" style="font-size: .7rem !important;">
                            <a href="">
                                دسته بندی
                            </a>
                        </div>
                        <div class="text-muted mx-2" style="font-size: .7rem !important;">
                            زمان مطالعه: 5
                            دقیقه
                        </div>
                        <div class="text-muted mx-2" style="font-size: .7rem !important;">
                            ایجاد شده در : 10 دقیقه پیش
                            دقیقه
                        </div>
                        <div class="text-muted mx-2" style="font-size: .7rem !important;">مطالعه آسان</div>
                    </div>
                </div>
                <div class="ribbon bg-red ribbon-start">پکیج</div>
                <div class="card-body" style="margin-top: -3rem !important;">
                    <div>
                        <h1>آشنایی با مفهوم تستینگ در مهندسی نرم‌افزار
                        </h1>
                        <p class="text-dark" style="line-height: 2;font-size: 1rem !important; text-align: justify">
                            تست نرم‌افزار یکی از مهمترین ویژگی‌هایی است که در سال‌های اخیر به عنوان یکی از ملزومات برای
                            استخدام برنامه‌نویسان در نظر گرفته شده است. تست نرم‌افزار به شما به عنوان یک برنامه نویس این
                            قابلیت را می‌دهد تا مطمئن شوید که آیا برنامه‌تان به درستی کار می‌کند یا خیر، آيا نرم‌افزارتان
                            خروجی‌های مورد نظر را تولید می‌کند یا خیر و مواردی از این دست.

                            در پروسه تست یک نرم افزار شما می‌توانید با مشکلات، اخطارها و ارورها آشنایی پیدا کنید و در نتیجه
                            برنامه سالم‌تری را تحویل بدهید. در این مقاله اختصاصی از وبسایت راکت قصد داریم شما را با مفهوم
                            تستینگ در مهندسی نرم افزار آشنا کرده و از انواع آن صحبت کنیم.

                            اهمیت تست نرم افزار در چیست؟
                            تست نرم افزار به ما این قابلیت را می‌دهد تا اگر مشکلی در نرم افزار ما وجود داشت بتوانیم قبل از
                            آنکه عملیات انتشار را شروع بکنیم از آن‌ها آگاهی پیدا کرده و حل نماییم. اگر یک نرم افزار به خوبی
                            تست شود پایداری، امنیت و کارایی بالایی را به کاربران می‌دهد که در نتیجه این موضوع باعث می‌شود
                            شما زمان کمتری را صرف دیباگ کردن کدها بکنید و در نتیجه مشتری راضی‌تری را داشته باشید.

                            اهمیت بالای تست کردن نرم افزار تنها در این نیست که یک خروجی اشتباه را ارائه دهد و یک مشتری با
                            شما تماس بگیرد بگوید یک مشکل جزئی پیش آمده، در برخی مواقع وقتی پروژه شما مربوط به یک شرکت یا فرد
                            مهم باشد می‌تواند دردسرهای بسیار زیادی را بوجود بیاورد.

                            تصور بکنید که به سادگی نرم‌افزارتان هک شود و یا کاربران را سردرگم کند، در این صورت توسعه دهنده
                            واقعا نیاز دارد که در مراحل توسعه تجدید نظر کرده و همه چیز را از ابتدا پیاده‌سازی بکند که در
                            نهایت باعث از دست رفتن شهرت‌ش می‌شود و همچنین باید زمان زیادی را برای ویرایش کدها در نظر بگیرد.
                            اما در فاز اول اگر به خوبی فرایند تستینگ را پیش می‌بُرد تمام این دردسرها از بین می‌رفتند و همگان
                            از یک نرم افزار خوب با کارایی بالا استفاده می‌کردند.

                            فواید کلیدی تست نرم افزار
                            مقرون به صرفه بودن: یکی از مهمترین ویژگی‌ها و فواید تست نرم افزار مقرون به صرفه بودن آن از دو
                            جهت مختلف است. انجام تست نرم افزار کار ساده‌ای بوده و نیاز به استخدام توسعه دهندگان جدید برای
                            اینکار وجود ندارد (البته در مقیاس‌های بسیار بزرگ این حالت باید باشد) و در مرحله بعدی وقتی شما
                            تست نرم افزار را انجام می‌دهید برنامه‌تان را برای مدت طولانی گارانتی کرده و در نتیجه مشکلات
                            کمتری را در آینده نیاز خواهید داشت که مدیریت کنید.

                            امنیت: این مورد یکی از مهمترین فوایدی است که تست نرم افزار در اختیار شما قرار خواهد داد. با
                            استفاده از عملیات تستینگ شما می‌‌توانید میزان امنیت اپلیکیشن‌تان را بالاتر ببرید و این دقیقا
                            همان چیزی‌ست که کاربران به دنبال آن هستند. با بالا بردن امنیت اپلیکیشن‌های‌تان شما می‌توانید
                            اعتبار خودتان را به عنوان یک برنامه‌نویس حفظ کرده و اعتماد‌های بیشتری را به خود جلب کنید.

                            کیفیت: زمانی که شما در فرایند اجرا یک نرم افزار با خطاهای کمتری روبرو شوید نتیجه خواهید گرفت که
                            این برنامه از کیفیت بالایی برخوردار است. برای اینکه بتوانید از این خطاها در اپلیکیشن خودتان
                            پرهیز کنید باید عملیات تست را پیش ببرید. در این صورت می‌توانید تمام سناریوهایی که ممکن است نرم
                            افزار به مشکل برخورد کند را حل کنید.

                            رضایت کاربران: در نهایت همه این موارد به یک نقطه بسیار مهم خواهد رسید و آن هم رضایت بالای
                            کاربران از اپلیکیشن شما است.

                            عملیات تستینگ و انواع آن
                        </p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock"
                                    width="20" height="20" viewBox="0 0 30 30" stroke-width="1.5" stroke="#000000"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg>
                                <p class="mx-1">1 ساعت پیش</p>
                            </div>
                            <div class="d-flex">
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                        width="20" height="20" viewBox="0 0 30 30" stroke-width="1.5" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                    <span class="text-muted" style="font-size: .7rem !important;">10</span>
                                </div>
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2"
                                        width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3" />
                                        <line x1="8" y1="9" x2="16" y2="9" />
                                        <line x1="8" y1="13" x2="14" y2="13" />
                                    </svg>
                                    <span class="text-muted" style="font-size: .7rem !important;">10</span>
                                </div>
                                <div class="mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark"
                                        width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-lg mt-3">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <div><p class="h3">نظرات</p></div>
                    <div>
                        <a href="" class="btn btn-sm btn-bitbucket">افزودن نظر</a>
                    </div>
                </div>
                <div class="card-body">
                    <div>

                    </div>
                    <div class="text-center h3">هنوز هیچ نظری ثبت نشده است!</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="avatar" src="https://i.pravatar.cc/150?img=56" alt="">
                                    <h3 class="mx-2">میلاد نویسنده</h3>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-bitbucket">دنبال کردن</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mt-2 text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa
                                magni, veniam similique maxime
                                ipsum eligendi ab quo omnis cumque esse voluptatem assumenda officiis optio ad!
                                Exercitationem nisi dolorum ad vitae.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>برچسب ها</h4>
                            <div class="mx-auto">
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>
                                <span class="badge bg-lime-lt">برچسب</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>به اشتراک بگذارید</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
