<form class="form-horizontal"  id="add_service"  method="post"  enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Service Name :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Service Name">
                          <div class="error" id="error_name">
                         </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                          <div class="error" id="error_description">
                          </div>
                        </div>
                      </div>
                 <div class="form-group row">
                        <label for="service_category_image" class="col-sm-3 col-form-label">Service Category Image :</label>
                        <div class="col-sm-8">
                          <input type="file" class="form-control" id="service_category_image" name="service_category_image" placeholder="Upload Service category Image">
                          <div class="error" id="error_service_category_image">
                         </div>
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label for="service_category_id" class="col-sm-3 col-form-label">Select category :</label>
                        <div class="col-sm-8">
                        <select class="form-control select2" id="service_category_id" name="service_category_id">
                        <option value="N/A" disabled selected="true">--Select category--</option>
                       @foreach($categorynames as $categoryname)
                      <option class="form-drop-items" value="{{$categoryname->id}}">{{$categoryname->name}}</option>
                        @endforeach
                       </select>
                        </div>
                      </div> 
                   <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                      </div>
                    </form>

                    
           