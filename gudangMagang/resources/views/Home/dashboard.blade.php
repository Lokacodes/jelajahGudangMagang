@extends('index')
@section('content')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome, {{ auth()->user()->nama }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card">
                    <div id="jam_aktif" class="card-body">
                        <center>
                            <label id="jam" class="fs-30 mb-2"></label> :
                            <label id="menit" class="fs-30 mb-2"></label> :
                            <label id="detik" class="fs-30 mb-2"></label>
                            <label id="pm_am" class="fs-30 mb-2"></label>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card">
                    <div id="tgl_hari_ini" class="card-body">
                        <?php
                        $tgl = date('Y-m-d');
                        function merubah_tanggal($tgl)
                        {
                            $bulan = [
                                1 => 'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember',
                            ];
                            $pecahkan = explode('-', $tgl);
                            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
                        }
                        ?>
                        <center>
                            <label class="fs-30 mb-2"><?php echo merubah_tanggal($tgl); ?></label>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 'super' || Auth::user()->role == 'kasir')
        <div class="container">
            <div class="card">
                <div class="face hidden">
                    <div class="content">
                        <h2>
                            <center>Barang</center>
                        </h2>
                        <div class="price">{{ $barang }} <small>Barang</small></div><br>
                        @if (Auth::user()->role == 'super')
                            <center><a type="button" class="btn btn-outline-primary btn-fw" href="/barang">Lihat</a>
                            </center>
                        @endif
                    </div>
                </div>
                <div class="face front">
                    <i class="ti-bag"></i>
                    <h2>Barang</h2>
                </div>
            </div>
            <div class="card">
                <div class="face hidden">
                    <div class="content">
                        <h2>
                            <center>Receiving</center>
                        </h2>
                        <div class="price">{{ $receive }} <small>Receiving</small></div><br>
                        @if (Auth::user()->role == 'super')
                            <center><a type="button" class="btn btn-outline-primary btn-fw" href="/received">Lihat</a>
                            </center>
                        @endif
                    </div>
                </div>
                <div class="face front">
                    <i class="ti-shopping-cart"></i>
                    <h2>Receiving</h2>
                </div>
            </div>
            <div class="card">
                <div class="face hidden">
                    <div class="content">
                        <h2>
                            <center>Sending</center>
                        </h2><br>
                        <div class="price">{{ $sending }} <small>Sending</small></div><br>
                        @if (Auth::user()->role == 'super')
                            <center><a type="button" class="btn btn-outline-primary btn-fw" href="/sent">Lihat</a>
                            </center>
                        @endif
                    </div>
                </div>
                <div class="face front">
                    <i class="ti-truck"></i>
                    <h2>Sending</h2>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="card">
                <div class="face hidden">
                    <div class="content">
                        <h2>
                            <center>Receiving</center>
                        </h2>
                        <div class="price">{{ $receive }} <small>Receiving</small></div><br>
                        @if (Auth::user()->role == 'super')
                            <center><a type="button" class="btn btn-outline-primary btn-fw" href="/received">Lihat</a>
                            </center>
                        @endif
                    </div>
                </div>
                <div class="face front">
                    <i class="ti-shopping-cart"></i>
                    <h2>Receiving</h2>
                </div>
            </div>
            <div class="card">
                <div class="face hidden">
                    <div class="content">
                        <h2>
                            <center>Sending</center>
                        </h2><br>
                        <div class="price">{{ $sending }} <small>Sending</small></div><br>
                        @if (Auth::user()->role == 'super')
                            <center><a type="button" class="btn btn-outline-primary btn-fw" href="/sent">Lihat</a>
                            </center>
                        @endif
                    </div>
                </div>
                <div class="face front">
                    <i class="ti-truck"></i>
                    <h2>Sending</h2>
                </div>
            </div>
        </div>
    @endif

    <!--JS Jam & Tanggal-->
    <script type="text/javascript">
        window.setTimeout("jam_aktif()", 1000);

        function jam_aktif() {
            var jam_aktif = new Date();
            setTimeout("jam_aktif()", 1000);
            var jam = jam_aktif.getHours();
            var menit = jam_aktif.getMinutes();
            var detik = jam_aktif.getSeconds();

            //AM/PM
            if (jam < 12) {
                document.getElementById("pm_am").innerHTML = 'AM';
            } else if (jam > 12) {
                document.getElementById("pm_am").innerHTML = 'PM';
            }

            //Jam
            if (jam == 0) {
                document.getElementById("jam").innerHTML = '0' + jam;
            } else if (jam < 10) {
                document.getElementById("jam").innerHTML = '0' + jam;
            } else if (jam == 10) {
                document.getElementById("jam").innerHTML = jam_aktif.getHours();
            } else if (jam > 10) {
                document.getElementById("jam").innerHTML = jam_aktif.getHours();
            }

            //MENIT
            if (menit == 0) {
                document.getElementById("menit").innerHTML = '0' + menit;
            } else if (menit < 10) {
                document.getElementById("menit").innerHTML = '0' + menit;
            } else if (menit == 10) {
                document.getElementById("menit").innerHTML = jam_aktif.getMinutes();
            } else if (menit > 10) {
                document.getElementById("menit").innerHTML = jam_aktif.getMinutes();
            }

            //DETIK
            if (detik == 0) {
                document.getElementById("detik").innerHTML = '0' + detik;
            } else if (detik < 10) {
                document.getElementById("detik").innerHTML = '0' + detik;
            } else if (detik == 10) {
                document.getElementById("detik").innerHTML = jam_aktif.getSeconds();
            } else if (detik > 10) {
                document.getElementById("detik").innerHTML = jam_aktif.getSeconds();
            }
        }
    </script>
@endsection
