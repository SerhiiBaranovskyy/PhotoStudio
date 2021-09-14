@extends('layouts.admin_layout')

@section('title', 'Категорії')

@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Категорії</h1>
          </div><!-- /.col --> 
          <form action="{{ route('category.create')}}" method="get" style="display: inline-block;">
            @csrf
            @method('get')
            <button class="btn btn-primary btn-sm" type="submit">Створити категорію</button>
          </form>
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>№</th>
                      <th>Назва категорії</th>
                      <th>Кількість фотографій</th>
                      <th>...</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; ?>
                    @foreach($categories as $category)
                    <tr>
                      <td>{{$count}}</td>
                      <?php $count++; ?>
                      <td>{{$category->name}}</td>
                      <td>{{$category->count}}</td>
                      <td>
                        <a href="{{ route('category.edit', $category)}}" class="btn btn-primary btn-sm">Редагувати</a>
                        <form action="{{ route('category.destroy', $category)}}" method="post" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">Видалити</button>
                        </form>
                      </td>                      
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
              </div>
              

              

@endsection