 <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editUserForm">
              <input type="hidden" id="edit_user_id" name="user_id">
              <div class="mb-3">
                <label>Username</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
              </div>
              <!-- Add other fields here -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="saveUser()">Save Changes</button>
          </div>
        </div>
      </div>
    </div>