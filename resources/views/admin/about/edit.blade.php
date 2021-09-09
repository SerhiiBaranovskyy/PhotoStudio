@extends('layouts.admin_layout')

@section('title', 'Про мене')

@section('content')


@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Про мене</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('about.update')}}">
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введіть заголовок" name="title" value="{{ $about->title }}">
                  </div>
                  <div class="form-group">
                      <span style="display:inline-block; width:83%;">
                        <label for="exampleInputPassword1">Опис</label>
                        <textarea type="text" class="form-control" id="exampleInputPassword1" rows="5" placeholder="Опис" name="description" >{{ $about->description }}</textarea>
                      </span>
                    <img src="{{ '/'.$about->path_photo }}" class="rounded float-right" id="aboutPhoto" alt="..." style="display:inline-block; width:15%;">
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Фото</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" class="form-control" id="inputFile" name="path_photo" value="{{ $about->path_photo }}">
                          </div>
                            <a href="" class="popup_selector" data-inputid="inputFile"><i class="fas fa-upload"></i></a>
                          </div>
                  </div>
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Зберегти</button>
               </div>
              </form>
</div>

@endsection

