<form action="{{ route('create.truck.action') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="addTrcukModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add New Truck') }}</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>                   
                </div>
                <div class="modal-body">
                    <label>Plat Truck<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter your plat truck" aria-label="Plat" aria-describedby="name-addon" id="plat_truck" name="plat_truck" value="{{ old('plat_truck') }}">
                    </div>

                    <label>Maksimal Beban Truck<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter max load truck" aria-label="Max" aria-describedby="name-addon" id="maksimal_beban_truck" name="maksimal_beban_truck" value="{{ old('maksimal_beban_truck') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0" href="{{ route('create.truck.action') }}">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
