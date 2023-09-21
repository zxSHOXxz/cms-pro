@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.ranks.update', $rank) }}">
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
                                    value="{{ $rank->name }}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                يبدأ من
                            </div>
                            <div class="col-12 pt-3">
                                <input type="number" name="start_at" required maxlength="190" class="form-control"
                                    value="{{ $rank->start_at }}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                قيمة الخصم
                            </div>
                            <div class="col-12 pt-3">
                                <input type="number" name="discount_value" required maxlength="190" class="form-control"
                                    value="{{ $rank->discount_value }}">
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
