@extends('index')
@section('content')

    <!--List Barang-->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Barang List</h3>
                        </div>
                        <!--Button Modal-->
                        <div class="col-md-4 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary" id="modal">Add Barang</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="100px">
                                        <center>No</center>
                                    </th>
                                    <th style="display: none">
                                        <center>Kode Barang</center>
                                    </th>
                                    <th>
                                        <center>Nama Barang</center>
                                    </th>
                                    <th width="200px">
                                        <center>Stok</center>
                                    </th>
                                    <th>
                                        <center>Status</center>
                                    </th>
                                    <th width="200px">
                                        <center>Deskripsi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($barang as $b)
                                    <tr>
                                        <td>
                                            <center>{{ $no++ }}</center>
                                        </td>
                                        <td style="display: none">
                                            <center>{{ $b->kode_barang }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $b->nama_barang }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $b->stok_barang }}</center>
                                        </td>
                                        <td>
                                            <center>
                                                @if ($b->status_barang == 1)
                                                    <a href="/barang/status/0/{{ $b->kode_barang }}">
                                                        <span class="btn btn-sm btn-success btn-icon-text">Unblock</span>
                                                    </a>
                                                @elseif ($b->status_barang == 0)
                                                    <a href="/barang/status/1/{{ $b->kode_barang }}"><span
                                                            class="btn btn-sm btn-danger btn-icon-text">Block</span></a>
                                                @endif
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="/barang/{{ $b->kode_barang }}">
                                                    <button type="button" class="btn btn-link btn-fw">View More</button>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <center>Belum Ada Data</center>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><br>
                    <div class="d-flex justify-content-center">
                        {!! $barang->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Barang-->
    <div class="modal fade" id="addTodoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Menambahkan Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="ver" id="ver" value="0">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                                <div class="form-group">
                                    <label for="kode_kategori">Kategori</label>
                                    <select class="form-control" name="kode_kategori" id="kode_kategori">
                                        <option selected value="-">-- Pilih Kategori --</option>
                                        @foreach ($kat as $k)
                                            <option value="{{ $k->kode_kategori }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_brand">Brand</label>
                                    <select class="form-control" name="kode_brand" id="kode_brand">
                                        <option selected value="-">-- Pilih Brand --</option>
                                        @foreach ($brand as $b)
                                            <option value="{{ $b->kode_brand }}">{{ $b->nama_brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_brand">Supplier</label>
                                    <select class="form-control" name="kode_supplier" id="kode_supplier">
                                        <option selected value="-">-- Pilih Supplier --</option>
                                        @foreach ($supplier as $s)
                                            <option value="{{ $s->kode_supplier }}">{{ $s->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input value="{{'BR-'.date('dmy').$kd}}" type="text" class="form-control" id="kode_barang" name="kode_barang"
                                        placeholder="Kode Barang" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"
                                        id="harga_jual" name="harga_jual" placeholder="harga_jual">
                                </div>
                            </div>
                            <span id="taskError" class="alert-message"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-user btn-block" id="tambah"
                        type="submit">Save</button>
                    <button type="button" class="btn btn-google btn-user btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--JS Modal-->
    @push('page-script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#modal').click(function() {
                    $('#addTodoModal').modal('show');
                    $('#ver').val("0");
                });
                $('#tambah').click(function() {
                    let kode_barang = $('#kode_barang').val();
                    let kode_kategori = $('#kode_kategori').val();
                    let kode_brand = $('#kode_brand').val();
                    let nama_barang = $('#nama_barang').val();
                    let harga_jual = $('#harga_jual').val();
                    let kode_supplier = $('#kode_supplier').val();
                    var ver = $('#ver').val();

                    //Store Kategori
                    if (kode_barang != "" && kode_kategori != "" && kode_brand != "" && nama_barang != "" &&
                        harga_jual != "" && kode_supplier != "" && ver == "0") {
                        $.ajax({
                            url: "/barang/store",
                            type: "POST",
                            data: {
                                _token: $("#csrf").val(),
                                kode_barang: kode_barang,
                                kode_kategori: kode_kategori,
                                kode_brand: kode_brand,
                                nama_barang: nama_barang,
                                harga_jual: harga_jual,
                                kode_supplier: kode_supplier,
                            },
                            success: function(data) {
                                if (data)
                                    alert(data.message);
                                window.location = "/barang";
                                $('#kode_barang').val("");
                                $('#kode_kategori').val("");
                                $('#kode_brand').val("");
                                $('#nama_barang').val("");
                                $('#harga_jual').val("");
                                $('#kode_supplier').val("");
                            },
                            error: function(response) {
                                let data = response.responseJSON.error;
                                $.each(data, function(key, value) {
                                    alert(data.message);
                                });
                                alert(data.message);
                            }
                        });
                    } else {
                        alert('Lengkapi isian data !');
                    }
                });
            });
        </script>

        <script>
            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>

        <script>
            var msg = '{{ Session::get('alert') }}';
            var exist = '{{ Session::has('alert') }}';
            if (exist) {
                alert(msg);
            }
        </script>
    @endpush
@endsection
