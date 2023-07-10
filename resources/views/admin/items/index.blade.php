@extends('admin.layouts.master');
<?php 
use Morilog\Jalali\Jalalian;
?>
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">لیست مجموعه ها</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <!-- <div class=" d-flex justify-content-between">
                            <div id="example_filter" class="dataTables_filter"><label>جستجو:<input type="search" class="" placeholder="" aria-controls="example"></label></div>
                            <div class="dataTables_length" id="example_length"><label>نمایش <select name="example_length" aria-controls="example" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> در هر صفحه</label>
                            </div>
                        </div> -->
                        <table id="example" class="display dataTable" style="min-width: 845px;width:100%" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">لوگو</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">نام مجموعه</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >نوع مجموعه</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >آدرس</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >شماره تماس</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >تاریخ ثبت</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">قیمت</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">وضعیت</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($items) == 0)
                                <tr class="odd" role="row">
                                    <td class="sorting_1 text-center" colspan="9">اطلاعاتی جهت نمایش وجود ندارد</td>
                                </tr>
                                @else
                                @foreach($items->items() as $item)
                                <tr class="even" role="row">
                                    <td><img style="width:65px" src="{{asset($item->logo_image ? $item->logo_image : 'admin-assets/images/no-image.jpg')}}"/></td>
                                    <td class="sorting_1">{{$item->title}}</td>
                                    <td>{{$item->categore->title}}</td>
                                    <td>{{@$item->contact_data['address'] ?? 'ثبت نشده'}}</td>
                                    <td>{{@$item->contact_data['phone'] ?? 'ثبت نشده'}}</td>
                                    <td>{{Jalalian::fromCarbon($item->created_at)->format('%Y/%m/%d h:i')}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->status=='1' ? 'فعال' : 'غیر فعال'}}</td>
                                    <td>
                                        <a title="ویرایش مجموعه" href="{{route('admin.items.edit',['item_id'=>$item->id])}}"><span class="icon icon-edit-72"></span></a>
                                        <a title="غیر فعال سازی" href="{{route('admin.items.delete',['item_id'=>$item->id])}}"><span class="icon icon-tag-cut"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">

                            <div class="dataTables_info" id="example_info" role="status" aria-live="polite">نمایش {{$items->firstItem()}} تا {{$items->lastItem()}} از {{$items->total()}} مجموعه</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                <a class="paginate_button previous disabled" href="{{$items->previousPageUrl()}}" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">قبلی</a>
                                <span>
                                    @for($i=1;$i<ceil($items->total() / $items->perPage());$i++)
                                        <a class="paginate_button {{$items->currentPage() == $i ? 'current' : '' }}" aria-controls="example" href={{$items->url($i)}} data-dt-idx="{{$i}}" tabindex="0">{{$i}}</a>
                                        @endfor
                                </span>
                                <a class="paginate_button next" href="{{$items->nextPageUrl()}}" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">بعدی</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection