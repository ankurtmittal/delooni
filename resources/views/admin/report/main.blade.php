@extends('admin.layout.template')
@section('contents')
<div class="card" id="data">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"> </li>
                     <!-- The Modal -->
                    <div class="modal" id="myModal"> 
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                           <!-- Modal body -->
                          <div class="modal-body">
                          </div>
                        </div>
                      </div>
                    </div>
                 <li class="nav-item search-right">
                   <div>
                      <div class="input-group" data-widget="sidebar-search">
                     </div>
                   </div>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="view">
                  @include('admin.report.view')
                 </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
</div>
@endsection