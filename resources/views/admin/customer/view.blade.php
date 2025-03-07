<div class="card border-0 shadow-none" id="test">
    <div class="card-header px-0 border-0">
    <h3 class="card-title font-weight-bold">Customers List</h3>
    </div>
<!-- /.card-header -->
    <div class="card-body border-0 p-0">
    <div class="table-responsive table-bordered">
    <table class="table">
    @if(count($data)>0)
    <thead>
    <tr>
    <th style="width: 10px">S.no.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Nationality</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    </thead>
    @endif
    <tbody>
    @forelse($data as $key=>$value)
    <tr>
    <td>{{$key+1}}</td>
    <td>{{$value->first_name}}</td>
    <td>{{$value->last_name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->phone}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->nationality}}</td>
    <td>@if($value->status==1)
    <button data-id="{{$value->id}}" class="disable_enable btn btn-success btn-xs" onclick="toggleDisableEnable(this)">Enable</button>
    @else
    <button data-id="{{$value->id}}" class="disable_enable btn btn-danger btn-xs" onclick="toggleDisableEnable(this)">Disable</button>
    @endif
    </td>
    <td>
    <a href='{{route("customer.view", $value->id)}}' target="_blank" class="btn btn-outline-dark btn-xs view">View</a>
    <button data-id="{{$value->id}}" style="cursor:pointer" data-toggle="modal" data-target="#myModal1" class="btn btn-outline-dark btn-xs update" id="update">Update</button>
    <!-- The Modal -->
    <div class="modal " id="myModal1">
    <div class="modal-dialog modal-lg">
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
    <h5 class="border p-2"> No User Available </h5>
    </center>
    @endforelse
</tbody>
</table>
</div>
</div>
{{-- {{$data->links()}} --}}
<!-- /.card-body -->
</div>
<!-- /.card -->
  
       
      



















