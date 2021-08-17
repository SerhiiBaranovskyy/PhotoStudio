@extends('layouts.admin_layout')

@section('title', 'Додати категорію')

@section('content')


@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Додати категорію</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('category.update', $category)}}">
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="name-category">Назва категорії</label>
                    <input type="text" class="form-control" id="name-category" name="name" value="{{ $category->name }}">
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
              </form>
            </div>

@endsection

