@extends('layouts.admin_layout')

@section('title', 'Фотографії')

@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Категорія - {{$category->name}}      </h1>            
          </div><!-- /.col --> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
                      <form method="POST" id="change_Form" action="{{ route('photo.update', ['category' => $category, 'photo' => $photo])}}">
                          @csrf
                          @method('PUT')
                      </form>
                      <tr>
                        <td style="line-height: 2.5vw;"><b>{{$count}}</b></td>
                            <?php $count++; ?>
                        <td>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="text" class="form-control" id="{{'path_photo'.$photo->id}}" name="path_photo" value="{{$photo->path_photo}}" form="change_Form">
                              
                            </div>
                            <a href="" class="popup_selector" data-inputid="{{'path_photo'.$photo->id}}"><i class="fas fa-upload"></i></a>
                          </div>
                        </td>
                        <td>
                          <img src="{{ '/photo/gallery/'.$photo->path_photo }}" class="rounded float-left" id="gallery" alt="..." style="width:80%;">
                        </td>
                        <td>
                          <button type="submit" form="change_Form" class="btn btn-primary">Змінити</button>
                        
                        
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
                                <input type="file" class="custom-file-input" id="inputFile" name="path_photo">
                                <label class="custom-file-label" id="inputFileLabel" for="exampleInputFile"></label>
                              </div>
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