@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> الزبائن
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        <a href="{{ route('admin.customers.create') }}">
                            <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                        </a>
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

                                <th> الاسم </th>
                                <th> عنوان السكن </th>
                                <th> تاريخ الميلاد </th>
                                <th> اجمالي النقاط </th>
                                <th> ملاحظات </th>
                                <th> التصنيف </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->birthday }}</td>
                                    <td>{{ $customer->adress }}</td>
                                    <td>{{ $customer->total_points }}</td>
                                    <td>{!! $customer->notes !!}</td>
                                    <td>{{ $customer->rank->name }}</td>
                                    <td style="width: 180px;">
                                        <a href="{{ route('admin.customers.edit', $customer) }}">
                                            <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                <span class="fas fa-wrench "></span> تحكم
                                            </span>
                                        </a>
                                        <form method="POST" action="{{ route('admin.customers.destroy', $customer) }}"
                                            class="d-inline-block">@csrf @method('DELETE')
                                            <button class="btn  btn-outline-danger btn-sm font-1 mx-1"
                                                onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                                <span class="fas fa-trash "></span> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="col-12 p-3">
                {{ $customers->appends(request()->query())->render() }}
            </div> --}}
        </div>
    </div>
@endsection
