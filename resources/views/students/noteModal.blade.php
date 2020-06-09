<div class="modal fade" id="formNoteModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="noteForm" method="POST" class="form-horizontal">
        @csrf
        <div class="modal-body">
          <span id="form_result"></span>
          <label>Module 1</label>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 1</label>
              <input type="text" class="form-control" name="module_1_note_1" id="module_1_note_1" placeholder="Note 1" >
            </div>  
            <div class="form-group col-md-6">
              <label >Note 2</label>
              <input type="text" class="form-control" name="module_1_note_2" id="module_1_note_2" placeholder="Note 2">
            </div>
          </div> 
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 3</label>
              <input type="text" class="form-control" name="module_1_note_3" id="module_1_note_3" >
            </div>
          </div>
          <hr>
          <label>Module 2</label>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 1</label>
              <input type="text" class="form-control" name="module_2_note_1" id="module_2_note_1" placeholder="Note 1">
            </div>  
            <div class="form-group col-md-6">
              <label >Note 2</label>
              <input type="text" class="form-control" name="module_2_note_2" id="module_2_note_2" placeholder="Note 2">
            </div>
          </div> 
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 3</label>
              <input type="text" class="form-control" name="module_2_note_3" id="module_2_note_3" >
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="action" id="action" value="Edit">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="hidden" name="hidden_id" id="hidden_id">
          <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>