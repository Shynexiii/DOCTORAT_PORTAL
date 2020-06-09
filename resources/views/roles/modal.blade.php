  <div class="modal fade" id="formRoleModal" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
            <form id="createRoleForm" method="POST" class="form-horizontal">
                @csrf
                  <div class="form-group">
                    <label >Name of role</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                  </div>        
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" id="action" value="Add">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add">
                </div>
            </form>
      </div>
    </div>
  </div>
  </div>