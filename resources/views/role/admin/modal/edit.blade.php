<form action="{{ url('admin/user', $user->user_id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="editUserModal{{ $user->user_id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit User') }}</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>   
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" id="successNotification" style="display: none;">
                        User updated successfully!
                    </div>

                    <label>Name</label>
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Input your name" aria-label="name" value="{{ $user->name }}">
                    </div>
                    <label>Email</label>
                    <div class="input-group mb-3">
                        <input name="email" type="text" class="form-control" placeholder="Input your email" aria-label="email" value="{{ $user->email }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit"  class="btn bg-gradient-primary w-100 mt-4 mb-0" value="Update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>