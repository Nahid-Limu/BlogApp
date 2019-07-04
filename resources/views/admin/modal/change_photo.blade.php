<!-- Modal -->
<div id="changeImage" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Update Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form method="post" id="changePhoto_modal_form" enctype="multipart/form-data">
                        @csrf
                  <!-- Modal body -->
                  <div class="modal-body">
                        
                        <!-- Error list Start -->
                        <span id="password_form_result"></span>
                        @if ($errors->any())
                        <div id="alert_message" class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Error list End -->
                        <div class="form-group"><label for="image" class="col-md-4 control-label">Photo</label>
    
                            <div class="col-md-8"><input id="image" required name="image" type="file" class="form-control"/></div>
        
                        </div>
                                
                            
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <input type="hidden" name="id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Update</button>
                </div>
            </form>
                </div>
              </div>
    </div>