@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.customers.update', $customer) }}">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> تعديل
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">


                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الاسم
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name" required maxlength="190" class="form-control"
                                    value="{{ $customer->name }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                عنوان السكن
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="adress" required maxlength="190" class="form-control"
                                    value="{{ $customer->adress }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                تاريخ الميلاد
                            </div>
                            <div class="col-12 pt-3">
                                <input type="date" name="birthday" required maxlength="190" class="form-control"
                                    value="{{ $customer->birthday }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اجمالي النقاط
                            </div>
                            <div class="col-12 pt-3">
                                <input type="number" name="total_points" required maxlength="190" class="form-control"
                                    value="{{ $customer->total_points }}">
                            </div>
                        </div>
                        <div class="col-12  p-2">
                            <div class="col-12">
                                ملاحظات
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="notes" class="editor with-file-explorer">{{ $customer->notes }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection
