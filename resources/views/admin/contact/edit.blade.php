@extends('layouts.admin_layout')

@section('title', 'Контакти')




@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Контакти</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   

<div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('contact.update')}}">
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="address">Адреса</label>
                    <input type="text" class="form-control" id="address" placeholder="Введіть адресу" name="address" value="{{ $contact->address }}">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" id="phone" placeholder="Введіть номер телефону" name="phone" value="{{ $contact->phone }}">
                    <label for="email">Електронна пошта</label>
                    <input type="text" class="form-control" id="email" placeholder="Введіть електронну пошту" name="email" value="{{ $contact->email }}">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" placeholder="Введіть посилання на Instagram" name="instagram" value="{{ $contact->instagram }}">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" placeholder="Введіть посилання на Twitter" name="twitter" value="{{ $contact->twitter }}">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" placeholder="Введіть посилання на Facebook" name="facebook" value="{{ $contact->facebook }}">
                  </div>


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
              </form>
            </div>

@endsection

