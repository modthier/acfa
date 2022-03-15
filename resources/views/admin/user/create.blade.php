@extends('admin.layouts.app')
@section('header')
    <div class="content-header-left col-md-12 col-12 mb-2">
        <h3 class="content-header-title">إضافة   مستخدم</h3>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
           <div class="card-body">
                <form action="{{ route('admin.user.register') }}" class="form row" method="POST">
                 @csrf
                    <div class="form-group col-lg-6">
                        <label for="name">اسم المستخدم</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="email">البريد الالكتروني </label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="password">كلمة المرور</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="password_confirmation">تاكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                   

                    <div class="form-group col-lg-12">
                       
                        <input type="submit" value="حفظ" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
    </div>
</div>
@endsection