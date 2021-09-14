@extends('layouts.admin_layout')

@section('title', 'Категорії')

@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Фотографії</h1>
          </div><!-- /.col --> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>№</th>
                      <th>Назва категорії</th>
                      <th>Кількість фотографій</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; ?>
                    @foreach($categories as $category)
                    <tr class='clickable-row' data-href="{{ route('photo.index', $category)}}">
                        <td>{{$count}}</td>
                        <?php $count++; ?>
                        <td>{{$category->name}}</td>
                        <td>{{$category->count}}</td>
                                          
                      

                    </tr>

                    @endforeach                    
                  </tbody>
                </table>
              </div>
              

              

@endsection