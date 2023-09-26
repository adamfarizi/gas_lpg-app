<form action="{{ route('create.gas.action') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="addStockModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add New Gas') }}</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>                   
                </div>
                <div class="modal-body">
                    <label>Jenis Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter your gas" aria-label="Gas" aria-describedby="name-addon" id="jenis_gas" name="jenis_gas" value="{{ old('jenis_gas') }}">
                    </div>

                    <label>Stock Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter your stock" aria-label="Stock" aria-describedby="name-addon" id="stock_gas" name="stock_gas" value="{{ old('stock_gas') }}">
                    </div>

                    <label>Harga Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Enter your price" aria-label="Harga" aria-describedby="name-addon" id="harga_gas" name="harga_gas" value="{{ old('harga_gas') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0" href="{{ route('create.gas.action') }}">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
