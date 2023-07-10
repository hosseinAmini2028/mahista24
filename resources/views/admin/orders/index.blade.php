@extends('admin.layouts.master');
<?php 
use Morilog\Jalali\Jalalian;
?>
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">لیست سفارشات</h4>
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">نام</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">نام مجموعه</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >شماره تماس</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >مبلغ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >کد پیگیری</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >تعداد</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >تاریخ ثبت</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">وضعیت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($orders) == 0)
                                <tr class="odd" role="row">
                                    <td class="sorting_1 text-center" colspan="9">اطلاعاتی جهت نمایش وجود ندارد</td>
                                </tr>
                                @else
                                @foreach($orders->items() as $item)
                                <tr class="even" role="row">
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->item->title}}</td>
                                    <td>{{$item->user->phone}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{@$item->payment->reference_id}}</td>
                                    <td>{{$item->reserves_count}}</td>
                                    <td class="ltr">{{Jalalian::fromCarbon($item->created_at)->format('%Y/%m/%d h:i')}}</td>
                                    <td>{{$item->status=='payed' ? 'موفق' : 'ناموفق'}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">

                            <div class="dataTables_info" id="example_info" role="status" aria-live="polite">نمایش {{$orders->firstItem()}} تا {{$orders->lastItem()}} از {{$orders->total()}} مجموعه</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                <a class="paginate_button previous disabled" href="{{$orders->previousPageUrl()}}" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">قبلی</a>
                                <span>
                                    @for($i=1;$i<ceil($orders->total() / $orders->perPage());$i++)
                                        <a class="paginate_button {{$orders->currentPage() == $i ? 'current' : '' }}" aria-controls="example" href={{$orders->url($i)}} data-dt-idx="{{$i}}" tabindex="0">{{$i}}</a>
                                        @endfor
                                </span>
                                <a class="paginate_button next" href="{{$orders->nextPageUrl()}}" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">بعدی</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection