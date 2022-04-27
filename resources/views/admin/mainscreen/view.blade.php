   <div class="card shadow-none border-0" id ="test">
    <div class="card-header px-0">
    <h3 class="card-title font-weight-bold">Splash screen</h3>
</div>
<!-- /.card-header -->
 <div class="card-body p-0" >
     <div class="table-responsive">
    <table class="table">
    @if(count($datas)>0)
    <thead>
    <tr>
    <th style="width: 10px">S.no.</th>
    <th>Screen Title</th>
    <th>Screen Image</th>
    <th>Screen Content</th>
    <th>Action</th>
    </tr>
    </thead>
    @endif
    <tbody>
    @forelse($datas as $key=>$value)
     <tr>
    <td>{{$key+1}}</td>
    <td>{{$value->title}}</td>
    <td>
   <img src="{{env('APP_URL')}}public/profile_image/{{$value->screen_image}}" height="60px" width="60px">
    </td>
    <td>{{$value->description}}</td>
    <td>
    <button data-id="{{$value->id}}" style="cursor:pointer" data-toggle="modal" data-target="#myModal1" class="btn btn-outline-success btn-xs update" class="viewJob_update">Update</button>
    <!-- The Modal -->
    <div class="modal " id="myModal1">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
   <!-- Modal Header -->
   <div class="modal-header">
    <h5 class="modal-title">Update</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!-- Modal body -->
    <div class="modal-body viewJob_update">
    </div>

</div>
</div>
</div>
<button data-id="{{$value->id}}" class="btn btn-danger btn-xs remove">Remove</button>
    </td>
    </tr>
    @empty
    <center>
    <h3> Screen not Available </h3>
    </center>
    @endforelse
</tbody>
</table>
</div>
</div>
<div id="num"  data-page="{{$datas->currentPage()}}">    
 {{$datas->links()}} 
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
