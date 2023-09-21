@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> الأقسام
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @can('categories-create')
                            <a href="{{ route('admin.purchases_create', '1') }}">
                                <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 py-2 px-2 row">
                <div class="col-12 col-lg-4 p-2">
                    <form method="GET">
                        <input type="text" name="q" class="form-control" placeholder="بحث ... "
                            value="{{ request()->get('q') }}">
                    </form>
                </div>
            </div>
            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;">


                    <table class="table table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> اسم المنتج</th>
                                <th> الكمية </th>
                                <th> سعر المنتج </th>
                                <th> الخصم على المنتج </th>
                                <th> مجمل السعر </th>
                                <th> اسم التصنيف </th>
                                <th> العميل </th>
                                <th> الملاحظات </th>
                                <th>تحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->id }}</td>
                                    <td>{{ $purchase->product_name }}</td>
                                    <td>{{ $purchase->product_quantity }}</td>
                                    <td>{{ $purchase->product_price }}</td>
                                    <td>{{ $purchase->discount_value }}</td>
                                    <td>{{ $purchase->total_price }}</td>
                                    <td>{{ $purchase->rank_name }}</td>
                                    <td>{{ $purchase->customer->name }}</td>
                                    <td>{!! $purchase->notes !!}</td>
                                    <td style="width: 180px;">
                                        @can('categories-update')
                                            <a href="{{ route('admin.purchases.edit', $purchase) }}">
                                                <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                    <span class="fas fa-wrench "></span> تحكم
                                                </span>
                                            </a>
                                        @endcan
                                        @can('categories-delete')
                                            <form method="POST" action="{{ route('admin.purchases.destroy', $purchase) }}"
                                                class="d-inline-block">@csrf @method('DELETE')
                                                <button class="btn  btn-outline-danger btn-sm font-1 mx-1"
                                                    onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                                    <span class="fas fa-trash "></span> حذف
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="col-12 p-3">
                {{ $categories->appends(request()->query())->render() }}
            </div> --}}
        </div>
    </div>
@endsection
