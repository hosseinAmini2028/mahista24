@extends('admin.layouts.master');

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">افزودن مجموعه جدید</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{route('admin.items.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نام مجموعه</label>
                            <div class="col-sm-10">
                                <input type="text" required name="title" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نوع مجموعه</label>
                            <div class="col-sm-10">
                                <select onchange="selectCategore(event)" required class="custom-select" id="inlineFormCustomSelect" name="categore_id">
                                    <option selected="">انتخاب کنید...</option>
                                    @foreach ($itemCategores as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نشان تجاری</label>

                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" id="logoimage" name="logo_image" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label">انتخاب تصویر</label>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end my-2">
                                <div class="logo-container" id="logo-preview" style="display:none">

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">تصویر اصلی</label>

                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" id="mainimage" name="main_image" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label">انتخاب تصویر</label>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end my-2">
                                <div class="logo-container" id="main-preview" style="display:none">

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">تصاویر مجموعه</label>

                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input multiple type="file" id="image_gallery" name="image_gallery[]" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label">انتخاب</label>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end my-2">
                                <div class="d-flex justify-content-end" id="image_gallerymain-preview">

                                </div>
                            </div>
                        </div>

                        <div class="form-group row" style="display:none" id="other-price">
                            <label class="col-sm-2 col-form-label">قیمت</label>
                            <div class="col-sm-10">
                                <input name="price" type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <fieldset class="form-group" style="display:none" id="hotel-price">
                            <div class="row w-100">
                                <label class="col-form-label col-sm-2 pt-0">قیمت ها</label>
                                <div class="col-sm-10">
                                    @foreach ($roomTypes as $roomType)
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <input onchange="getDisabaled(event,'price-roomType-{{$roomType->id}}')" class="form-check-input" type="checkbox" name="roomType[{{$roomType->id}}][check]">
                                                <label class="form-check-label">
                                                    {{$roomType->title}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <input disabled id="price-roomType-{{$roomType->id}}" type="number" class="form-control" name="roomType[{{$roomType->id}}][price]" placeholder="قیمت">
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </fieldset>
                        <h3 class="fw-bold fs-4">اطلاعات تماس</h3>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">آدرس</label>
                            <div class="col-sm-10">
                                <input name="contact_data[address]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">شماره تلفن</label>
                            <div class="col-sm-10">
                                <input name="contact_data[phone]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input name="contact_data[email]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">وب سایت</label>
                            <div class="col-sm-10">
                                <input name="contact_data[website]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <h3 class="fw-bold fs-4">شبکه های اجتماعی</h3>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">فیسبوک</label>
                            <div class="col-sm-10">
                                <input name="social_links[facebook]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">اینستاگرام</label>
                            <div class="col-sm-10">
                                <input name="social_links[instagram]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">توییتر</label>
                            <div class="col-sm-10">
                                <input name="social_links[twitter]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    window.addEventListener('load', function() {
        const selectLogo = document.querySelector("#logoimage");
        const previewLogo = document.getElementById("logo-preview");
        const selectMainImage = document.querySelector("#mainimage");
        const previewMainImage = document.getElementById("main-preview");
        const selectImageGallery = document.querySelector("#image_gallery");
        const previewImageGallery = document.getElementById("image_gallerymain-preview");
        selectLogo.addEventListener("change", function(e) {
            getImgData(e,previewLogo);
        });
        selectMainImage.addEventListener("change", function(e) {
            getImgData(e, previewMainImage);
        });
        selectImageGallery.addEventListener("change", function(e) {
            getMultipleImgData(e, previewImageGallery);
        });

        function getImgData(e, imageContainer) {
            const files = e.target.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imageContainer.style.display = "flex";
                    imageContainer.innerHTML = '<img src="' + this.result + '" />';
                });
            }
        }

        function getMultipleImgData(e, imageContainer) {
            const files = e.target.files;
            if (files.length > 0) {
                for (const file of Object.values(files)) {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL(file);
                    fileReader.addEventListener("load", function() {
                        imageContainer.innerHTML += '<div class="logo-container"> \
                          <img src="' + this.result + '" /> \
                        </div>';
                    });

                }
            }
        }


    });

    function selectCategore(e, slug) {
        let hotelPrice = document.querySelector(`#hotel-price`);
        let otherPrice = document.querySelector(`#other-price`);
        if (e.target.value == '1') {
            hotelPrice.style.display = 'flex';
            otherPrice.style.display = 'none';
        } else {
            hotelPrice.style.display = 'none';
            otherPrice.style.display = 'flex';
        }
    }

    function getDisabaled(e, inputItemId) {
        let inputItem = document.querySelector(`#${inputItemId}`);
        if (inputItem) {
            console.log(e.target.checked);
            if (e.target.checked) {
                inputItem.disabled = false;
            } else {
                inputItem.disabled = true;
            }

        }
    }
</script>