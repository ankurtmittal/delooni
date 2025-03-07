@extends('admin.layout.template')
@section('contents')
<div class="card" id ="test">
    <div class="card-header">
    <h3 class="card-title">Static Content</h3>
</div>
<form class="form-horizontal"  id="content_update"  method="post"  enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Screen Title :</label>
                      
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="title" name="title" value="{{$screen->title}}" readonly>
                        </div>
                      </div>
                     <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description :</label>
                        <div class="col-sm-8">
                        <textarea rows="9" cols="55" name="description" id="description" readonly>{{$screen->description}}
                       </textarea>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="screen_image" class="col-sm-3 col-form-label">Service Category Image :</label>
                        <div class="col-sm-8">
                        <img src="{{URL::to('/')}}/profile_image/{{$screen->screen_image}}">
                        </div>
                      </div>  
  </form>
</div>
  @endsection