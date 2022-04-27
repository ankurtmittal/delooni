<div class="card shadow-none border-0" id ="test">
    <div class="card-header px-0">
    <h3 class="card-title">Static Content List</h3>
</div>
<!-- /.card-header -->
 <div class="card-body p-0" >
     <div class="table-responsive">
    <table class="table">
    @if(count($content)>0)
    <thead>
    <tr>
    <th style="width: 10px">S.no.</th>
    <th style="width:40%;">Terms and condition</th>
    <th>Screen Baner Image</th>
     <th>Action</th>
    </tr>
    </thead>
    @endif
    <tbody>
    @forelse($content as $key=>$value)
    <tr>
    <td>{{$key+1}}</td>
    <td>
    <img src="{{URL::to('/')}}/profile_image/{{$value->screen_baner_image}}" width="100px" height="100px">
    </td>
   <td>
    <a href='{{route("content.view", $value->id)}}'   target="_blank" class="btn btn-outline-success btn-xs view">View</a>
    <button data-id="{{$value->id}}" style="cursor:pointer" data-toggle="modal" data-target="#myModal1" class="btn btn-outline-success btn-xs update" class="viewjob_update">Update</button>
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
    <h3> No condition </h3>
    </center>
    @endforelse
</tbody>
</table>
</div>
</div>

<!-- /.card-body -->
</div>
<!-- /.card -->