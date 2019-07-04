<!-- Modal -->
<div id="changePassword" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form id="change_password">
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
                        <div class="control-group">
                            <label for="current_password" class="control-label">Current Password</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="current_password" autocomplete="new-password" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="new_password" class="control-label">New Password</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="new_password" id="new_password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="confirm_password" class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                autocomplete="off" required>
                            </div>
                        </div>
    
                        <i class="fa fa-eye" id="show"> Show Password</i>
                                
                            
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-danger float-left">Reset</button>
                    <button type="button" class="btn btn-info" id="changePass"><i class="fa fa-refresh"> Change</i></button>
                </div>
            </form>
                </div>
              </div>
    </div>