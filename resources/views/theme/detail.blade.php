@extends('theme.layouts.master')
@section('title', $item->title)

@section('content')
<!-- Page header-->
<section class="container pt-5 mt-5">
    <!-- Breadcrumb-->
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">خانه</a></li>
            <li class="breadcrumb-item"><a href="">جستجوی اقامتگاه</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li>
        </ol>
    </nav>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-sm-2">
        <h1 class="h2 me-3 mb-sm-0">{{$item->title}}</h1>
        <div class="text-nowrap">
            <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle" type="button" data-bs-toggle="tooltip" title="نشان کردن"><i class="fi-heart"></i></button>
            <div class="dropdown d-inline-block" data-bs-toggle="tooltip" title="اشتراک گذاری">
                <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2" type="button" data-bs-toggle="dropdown"><i class="fi-share"></i></button>
                <div class="dropdown-menu dropdown-menu-end my-1">
                    <button class="dropdown-item" type="button"><i class="fi-facebook fs-base opacity-75 me-2"></i>فیسبوک</button>
                    <button class="dropdown-item" type="button"><i class="fi-twitter fs-base opacity-75 me-2"></i>توییتر</button>
                    <button class="dropdown-item" type="button"><i class="fi-instagram fs-base opacity-75 me-2"></i>اینستاگرام</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery-->
<section class="container overflow-auto mb-5" data-simplebar>
    <div class="row g-2 g-md-3 gallery" data-thumbnails="true" style="min-width: 30rem;">
        <div class="col-8"><a class="gallery-item rounded rounded-md-3" href="{{ asset($item->main_image) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;اتاق کودک&lt;/h6&gt;"><img src="{{ asset($item->main_image) }}" alt="Gallery thumbnail"></a></div>
        <div class="col-4">
            @if(count($item->image_gallery) > 0)
            <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3" href="{{ asset($item->image_gallery[0]['url']) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;اتاق خواب&lt;/h6&gt;"><img src="{{ asset('theme-assets/img/city-guide/single/02.jpg') }}" alt="Gallery thumbnail"></a>
            @endif
            @if(count($item->image_gallery) > 1)
            <a class="gallery-item rounded rounded-md-3" href="{{ asset($item->image_gallery[1]['url']) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;اداری&lt;/h6&gt;"><img src="{{ asset('theme-assets/img/city-guide/single/03.jpg') }}" alt="Gallery thumbnail"></a>
            @endif
        </div>
        <div class="col-12">
            <div class="row g-2 g-md-3">
                @if(count($item->image_gallery) > 2)
                <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ asset(asset($item->image_gallery[2]['url'])) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;اتاق کار&lt;/h6&gt;"><img src="{{ asset(asset($item->image_gallery[2]['url'])) }}" alt="Gallery thumbnail"></a>
                </div>
                @endif
                @if(count($item->image_gallery) > 3)
                <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ asset(asset($item->image_gallery[3]['url'])) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;اتاق مستر&lt;/h6&gt;"><img src="{{ asset(asset($item->image_gallery[3]['url'])) }}" alt="Gallery thumbnail"></a>
                </div>
                @endif
                @if(count($item->image_gallery) > 4)
                <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ asset(asset($item->image_gallery[4]['url'])) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;سرویس بهداشتی&lt;/h6&gt;"><img src="{{ asset(asset($item->image_gallery[4]['url'])) }}" alt="Gallery thumbnail"></a>
                </div>
                @endif
                @if(count($item->image_gallery) > 5)
                <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ asset(asset($item->image_gallery[5]['url'])) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;دستشویی فرنگی&lt;/h6&gt;"><img src="{{ asset(asset($item->image_gallery[5]['url'])) }}" alt="Gallery thumbnail"></a>
                </div>
                @endif
                @if(count($item->image_gallery) > 6)
                <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ asset(asset($item->image_gallery[6]['url'])) }}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;حمام&lt;/h6&gt;"><img src="{{ asset(asset($item->image_gallery[6]['url'])) }}" alt="Gallery thumbnail"></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Page content-->
<section class="container pb-5 mb-md-4">
    <div class="row">
        <div class="col-md-12 mb-md-0 mb-3">
            <div class="card py-2 px-sm-4 px-3 shadow-sm">
                <div class="card-body mx-n2">
                    <!-- Place info-->
                    <div class="d-flex align-items-start mb-3 pb-3 border-bottom"><img src="{{ $item->logo_image ? asset($item->logo_image) : asset('theme-assets/img/city-guide/brands/hotel.svg') }}" width="60" alt="Thumbnail">
                        <div class="pe-2 me-1">
                            <h3 class="h5 mb-2">{{$item->title}}</h3>
                            <ul class="list-unstyled d-flex flex-wrap fs-sm">
                                <li class="me-2 mb-1 pe-1"><i class="fi-wallet mt-n1 ms-1 align-middle opacity-70"></i>{{$item->price}} تومان</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Place contacts-->
                    <div class="mb-3 pb-3 border-bottom">
                        <h4 class="h5 mb-2">تماس با ما: </h4>
                        <ul class="nav row row-cols-sm-2 row-cols-1 gy-1">
                            <li class="col"><a class="nav-link p-0 fw-normal d-flex align-items-start" href="#"><i class="fi-map-pin mt-1 me-2 align-middle opacity-70"></i>{{@$item->contact_data['address'] ?? 'ثبت نشده'}}</a></li>
                            <li class="col"><a class="nav-link d-inline-block p-0 fw-normal d-inline-flex align-items-start" href="tel:3025550107"><i class="fi-phone mt-1 me-2 align-middle opacity-70"></i>(302) 555-0107</a>, <a class="nav-link d-inline-block p-0 fw-normal" href="tel:3025550208">(302)
                                    555-0208</a></li>
                            <li class="col"><a class="nav-link p-0 fw-normal d-flex align-items-start" href="#"><i class="fi-globe mt-1 me-2 align-middle opacity-60"></i>{{@$item->contact_data['website'] ?? 'ثبت نشده'}}</a></li>
                            <li class="col"><a class="nav-link p-0 fw-normal d-flex align-items-start" href="mailto:bb-hotel@example.com"><i class="fi-mail mt-1 me-2 align-middle opacity-70"></i>{{@$item->contact_data['email'] ?? 'ثبت نشده'}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Place pricing-->
                    <form action="{{route('order.create')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$item->id}}" name="item_id" />
                        <input type="hidden" value="{{$item->categore_id}}" name="categore_id" />
                        <div class="mb-3 pb-3 border-bottom">
                            @if($item->categore_id == 1)
                            @foreach($item->roomTypes as $roomtype)
                            <div class="row justify-content-between my-2 align-items-center">
                                <div class="col-4 mb-sm-0 mb-3">
                                    <h4 class="h5 mb-0">
                                        <span class="fs-5">{{$roomtype->title}}</span>
                                    </h4>
                                </div>
                                <div class="col-4 mb-sm-0 mb-3">
                                    <h4 class="h5 mb-0">
                                        <span class="fs-5">{{$roomtype->pivot->price}} تومان </span>
                                        <span class="fs-base fw-normal text-body">/شب</span>
                                    </h4>
                                </div>
                                <div class="col-4 mb-sm-0 mb-3">
                                    <div class="qutity-btns">
                                        <button class="fs-5 fw-bold sub-btn" id="sub-btn" onclick="addQuntity(event,'qutity-input-{{$roomtype->pivot->id}}')">+</button>
                                        <input type="number" id="qutity-input-{{$roomtype->pivot->id}}" name="qutity[{{$roomtype->pivot->id}}][count]" value="0" />
                                        <button class="fs-5 fw-bold add-btn" id="add-btn" onclick="subQuntity(event,'qutity-input-{{$roomtype->pivot->id}}')">-</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <h5 class="fs-6 mt-3 mb-0">مدت زمان اقامت</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>شروع</label>
                                    <input required id="date_start_at" name="start_at" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <label>پایان</label>
                                    <input type="text" required id="date_end_at" name="end_at" class="form-control" placeholder="">
                                </div>
                            </div>

                            @else
                            @if($item->categore->slug == 'tors')
                            <div class="row my-2 border-bottom">
                                <p>
                                    {!! $item->description !!}
                                </p>
                            </div>
                            @endif
                            <div class="row row-cols-sm-2 row-cols-2">
                                <div class="col mb-sm-0 mb-3">
                                    <h4 class="h5 mb-0">
                                        <span class="fs-5">قیمت: </span>
                                        <span class="fs-5">{{$item->price}} تومان </span>
                                    </h4>
                                </div>
                                <div class="qutity-btns p-0">
                                    <button class="fs-5 fw-bold sub-btn" id="sub-btn" onclick="addQuntity(event,'qutity-input')">+</button>
                                    <input type="number" id="qutity-input" name="qutity[1][count]" value="1" />
                                    <button class="fs-5 fw-bold add-btn" id="add-btn" onclick="subQuntity(event,'qutity-input')">-</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        <h5 class="fs-6 mb-0 mt-1">مشخصات فردی</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" required name="name" class="form-control" placeholder="نام">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" required name="phone" class="form-control" placeholder="شماره تلفن">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" required name="meliCode" class="form-control" placeholder="کد ملی">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-primary btn-lg rounded-pill w-sm-auto w-100" type="submit">
                                    رزرو و پرداخت آنلاین
                                    <i class="fi-chevron-right fs-sm ms-2"></i>
                                </button>
                            </div>
                        </div>
                </div>
                </form>
                <!-- Follow-->
                <div class="d-flex align-items-center">
                    <h4 class="h5 mb-0 me-3">دنبال کردن: </h4>
                    <div class="text-nowrap"><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2" href="#"><i class="fi-instagram"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle" href="#"><i class="fi-twitter"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location (Map)-->
  <!--   <div class="col-md-5">
        <div class="position-relative bg-size-cover bg-position-center bg-repeat-0 h-100 rounded-3" style="background-image: url({{ asset('theme-assets/img/city-guide/single/map.jpg') }}); min-height: 250px;">
            <div class="d-flex h-100 flex-column align-items-center justify-content-center"><img class="d-block mx-auto mb-4 rounded-circle bg-white shadow" src="{{ asset('theme-assets/img/city-guide/brands/hotel.svg') }}" width="40" alt="Place logo"><a class="btn btn-primary rounded-pill stretched-link" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2423.924340088787!2d13.428504251724927!3d52.58906113876177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a85284201593ab%3A0x28af69e02ce0e2fc!2sBusinesshotel%20Berlin!5e0!3m2!1sru!2sua!4v1618908622013!5m2!1sru!2sua" data-iframe="true" data-bs-toggle="lightbox"><i class="fi-route me-2"></i>مشاهده نقشه</a>
            </div>
        </div>
    </div> -->
    </div>
</section>
<script>
    window.addEventListener('load', function() {
        $('#date_start_at').persianDatepicker({
            format: 'YYYY/MM/DD',
        });
        $('#date_end_at').persianDatepicker({
            format: 'YYYY/MM/DD',
        });
    });

    function addQuntity(e, name) {
        quntityInput = document.querySelector(`#${name}`);
        if (quntityInput) {
            quntityInput.value = +quntityInput.value + 1;
        }

    }

    function subQuntity(e, name) {
        quntityInput = document.querySelector(`#${name}`);
        if (quntityInput && +quntityInput.value > 0) {
            quntityInput.value = +quntityInput.value - 1;
        }
    }
</script>
@endsection