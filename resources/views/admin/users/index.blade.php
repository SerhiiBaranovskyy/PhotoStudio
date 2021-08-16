@extends('layouts.admin_layout')

@section('title', 'Адміністратори')

@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Адміністратори</h1>
          </div><!-- /.col -->          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ім'я</th>
                      <th>E-mail</th>
                      <th>...</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        <form action="{{ route('user.destroy', $user)}}" method="post" style="display: inline-block">
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