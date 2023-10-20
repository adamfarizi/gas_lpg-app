<form action="{{ route('create.gas.action') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="addStockModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Tambahkan Gas Baru') }}</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>                   
                </div>
                <div class="modal-body">
                    <label>Name Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan nama gas" aria-label="Gas" aria-describedby="name-addon" id="name_gas" name="name_gas" value="{{ old('name_gas') }}">
                    </div>

                    <label>Berat Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Masukkan berat gas" aria-label="Berat" aria-describedby="name-addon" id="berat_gas" name="berat_gas" value="{{ old('berat_gas') }}">
                    </div>

                    <label>Stock Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Masukkan jumlah gas" aria-label="Stock" aria-describedby="name-addon" id="stock_gas" name="stock_gas" value="{{ old('stock_gas') }}">
                    </div>

                    <label>Jenis Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Jenis Gas" name="jenis_gas">
                            <option value="Isi Ulang"{{ old('jenis_gas') === 'Isi Ulang' ? 'selected' : '' }}>Isi Ulang</option>
                            <option value="Gas Baru"{{ old('jenis_gas') === 'Gas Baru' ? 'selected' : '' }}>Gas Baru</option>
                        </select>
                    </div>

                    <label>Harga Gas<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Masukkan harga gas" aria-label="Harga" aria-describedby="name-addon" id="harga_gas" name="harga_gas" value="{{ old('harga_gas') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0" href="{{ route('create.gas.action') }}">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
