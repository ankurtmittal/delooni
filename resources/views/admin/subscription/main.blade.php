@extends('admin.layout.template')
@section('contents')
<div class="card" id="data">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" style="cursor:pointer" 
                        data-toggle="modal" 
                        data-target="#myModal">Add Subscription</a></li>
                   <!-- The Modal -->
                    <div class="modal" id="myModal"> 
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Add Subscription</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          @include('admin.subscription.add_subscription')
                          <!-- Modal body -->
                          <div class="modal-body">
                         
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- <li class="nav-item"><a class="nav-link" href="#view" data-toggle="tab">Add User</a></li> -->
                  <li class="nav-item search-right">
                   <div>
                      <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" id="search" type="search" placeholder="Search" aria-label="Search">
                      </div>
                   </div>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="view">
                     @include('admin.subscription.view')
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
      </div>
<script>
    $("#add_subscription").on('submit', function (e){ 
     e.preventDefault();
     var data = new FormData(this);
     console.log(data);
     $.ajax({
     method:'post',
     url:"{{route('subscription.add')}}",
     cache: false,
     contentType: false,
     processData: false,
     dataType: "JSON",
     data : {data: data},
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
    data:data,
    success:function(data){
   location.reload();
    $("body").removeClass("modal-open");
     },
  error:function(data){
                                         
    $.each(data.responseJSON.errors, function(id,msg){
    $('#error_'+id).html(msg);
 })
}
});
    
}) 
function toggleDisableEnable(e){
 var id = $(e).attr('data-id');
 $('#page-loader').show();
 $.ajax({
      url:"{{route('subscription.status')}}",
      data:{id:id},
      dataType: "JSON",
      success:function(data)
      { 
      // var page = $('#test').data('page');
      $('#page-loader').hide();
      location.reload();
   
      },
     error:function(error){
     $('#page-loader').hide();
   }
 });
}

$(document).on("keyup","#search",(e)=>{
fetch_data(1);
});

function fetch_data(page)
{
    $('#page-loader').show();
    let value=document.querySelector("#search").value;
    var make_url="{{route('subscription.search')}}";
    var data={'page':page,'search':value};
    $.ajax({
        url:make_url,
        data:data,
        success:function(data)
        {
        $('#test').empty().html(data);
        $('#page-loader').hide();
        },
        error:function(error){
        $('#page-loader').hide();
        }
    })
}
$(document).on('click', '.pagination a', function(event){
 event.preventDefault();
 var page = $(this).attr('href').split('page=')[1];
 var sendurl=$(this).attr('href');
 fetch_data(page);
 
});
</script>
@endsection