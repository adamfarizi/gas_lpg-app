<form action="{{ route('create.action') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Tambah Pengguna Baru') }}</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>                   
                </div>
                <div class="modal-body">
                    <label>Name <span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter your name" aria-label="Name" aria-describedby="name-addon" id="name" name="name" value="{{ old('name') }}">
                    </div>

                    <label>Email <span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email" aria-describedby="email-addon" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <label>Role <span class="text-danger">*</span></label>
                    <select class="mb-3 form-control" id="role" name="role">
                        <option value="admin">Admin</option>
                        <option value="agen">Agen</option>
                        <option value="kurir">Kurir</option>
                    </select>

                    <label>Password <span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Enter your password" aria-label="Password" aria-describedby="password-addon" id="password" name="password" value="{{ old('password') }}" oninput="checkPasswordComplexity(this)">
                        <div id="password-addon" style="color: red;"></div>
                    </div>

                    <label>Confirm Password <span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Confirm your password" aria-label="Password" aria-describedby="password-addon" id="password_confirmation" name="password_confirmation" value="{{ old('password') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0" href="{{ route('create.action') }}">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function checkPasswordComplexity(inputElement) {
        var password = inputElement.value;
        var complexityMessage = document.getElementById("password-addon");
    
        if (password.length < 8) {
            inputElement.setCustomValidity("Password harus memiliki setidaknya 8 karakter.");
        } else {
            inputElement.setCustomValidity("");
        }
    }
    </script>