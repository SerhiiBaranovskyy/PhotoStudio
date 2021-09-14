@extends('layouts.admin_layout')

@section('title', 'Фотографії')

@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Фотографії - {{$category->name}}      </h1>            
          </div><!-- /.col --> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <form method="POST" action="{{url('photo/gallery')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
            {{csrf_field()}}
            <div class="dz-default dz-message"><h4>Перетягніть файли або клікніть для завантаження</h4></div>
          </form>
        </div>
      </div>
   








    <!-- /.content-header -->
    <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>№</th>
                      <th>Розміщення</th>
                      <th style="width:15%;">Фотографія</th>
                      <th>...</th>                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php $count = 1; ?>
                      @foreach($photos as $photo)
                      <tr>
                        <td style="line-height: 2.5vw;"><b>{{$count}}</b></td>
                            <?php $count++; ?>
                        <td>
                          <form method="POST" id="{{'form'.$photo->id}}" action="{{ route('photo.update', ['category' => $category, 'photo' => $photo])}}">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="text" class="form-control" id="{{'path_photo'.$photo->id}}" name="path_photo" value="{{$photo->path_photo}}" form="{{'form'.$photo->id}}">
                              
                              </div>
                              <a href="" class="popup_selector" data-inputid="{{'path_photo'.$photo->id}}"><i class="fas fa-upload"></i></a>
                            </div>
                            <button type="submit" form="{{'form'.$photo->id}}" class="btn btn-primary">Змінити</button>
                          </form>  
                    
                        </td>
                        <td>
                          <img src="{{ '/'.$photo->path_photo }}" class="rounded float-left" id="gallery" alt="..." style="width:80%;">
                        </td>
                        <td>
                        
                   <form action="{{ route('photo.destroy', ['category' => $category, 'photo' => $photo])}}" method="post" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Видалити</button>
                            </form>
                          </td>                                       
                      </tr>
                    @endforeach
                      <tr>
                        <form method="POST" action="{{ route('photo.store', $category)}}">
                          @csrf
                          @method('PUT')
                          <td style="line-height: 2.5vw;">
                            <i class="fas fa-plus-circle"></i>
                          </td>
                          <td>
                            <div class="input-group">
                            <div class="custom-file">
                              <input type="text" class="form-control" id="add_photo_input" name="path_photo">
                            </div>
                            <a href="" class="popup_selector" data-inputid="add_photo_input"><i class="fas fa-upload"></i></a>
                          </div>
                                                    </td>
                          <td>
                            <img id="add_photo" class="rounded float-left" alt="..." style="width:80%; display: none;">
                          </td>
                          <td>
                            <button type="submit" class="btn btn-primary">Додати</button>
                          </td>
                        </form>
                        
                      </tr>                    
                  </tbody>
                </table>
              </div>
              

              

@endsection