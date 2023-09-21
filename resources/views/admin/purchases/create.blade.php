@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.purchases.store') }}">
                @csrf
                <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{ uniqid() }}">
                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> إضافة جديد
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                اسم المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="product_name" required maxlength="190" class="form-control"
                                    value="{{ old('product_name') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الكمية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="number" name="product_quantity" required maxlength="190" class="form-control"
                                    value="{{ old('product_quantity') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                سعر المنتج
                            </div>
                            <div class="col-12 pt-3">
                                <input type="number" name="product_price" required maxlength="190" class="form-control"
                                    value="{{ old('product_price') }}">
                            </div>
                        </div>
                        <input type="hidden" name="customer_id" value="{{ $id }}">
                        <div class="col-12  p-2">
                            <div class="col-12">
                                ملاحظات
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="notes" class="editor with-file-explorer">{{ old('notes') }}</textarea>
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
