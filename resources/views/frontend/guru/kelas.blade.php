@extends('layouts.template_guru')
@section('contents')
    <div class="row justify-content-center">
        <div class="card col-sm-12 col-lg-5">
            <div class="card-body">
                <div class="row">
                    <div class="col mb-4 mb-lg-0 text-center">
                        <a href="">
                            <i data-feather="book-open" style="width: 80px; height: 60px; color: #6c757d"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Materi</div>
                        </a>
                    </div>
                    <a href="" class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="file" style="width: 80px; height: 60px; color: #6c757d"></i>
                        <div class="mt-2 font-weight-bold" style="color: #6c757d;">Tugas</div>
                    </a>
                    {{-- <div class="col mb-4 mb-lg-0 text-center">
                        <a href="{{ route('absensi.create', encrypt($jadwal->id)) }}">
                            <i data-feather="clipboard" style="width: 80px; height: 60px; color: #6c757d;"></i>
                            <div class="mt-2 font-weight-bold" style="color: #6c757d;">Absensi</div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card col-sm-12 col-lg-6 mx-1">
            <div class="card-body">
                <div class="row">
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="users" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Total Mahasiswa</div>
                        <h6 class="badge badge-dark">{{ $count }}</h6>
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-check" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Absensi Keseluruhan 
                            <br>
                                                    @if($absen_izin_total !== null)
                                                       <h6 class="badge badge-dark">{{ $absen_izin_total }}</h6> siswa izin
                                                    @endif <br>
                                                     @if($absen_sakit_total !== null)
                                                        <h6 class="badge badge-dark">{{ $absen_sakit_total }}</h6> siswa sakit
                                                    @endif<br>
                                                     @if($absen_alpha_total !== null)
                                                        <h6 class="badge badge-dark">{{ $absen_alpha_total }}</h6> siswa alpa
                                                    @endif

                                                
                        </div>
                        {{-- <h6 class="badge badge-info">{{ $mahasiswaHadir }}</h6> --}}
                    </div>
                    
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-check" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Absensi hari ini 
                            <br>
                                                    @if($counthariini_izin !== null)
                                                       <h6 class="badge badge-dark">{{ $counthariini_izin }}</h6> siswa izin
                                                    @endif <br>
                                                     @if($counthariini_sakit !== null)
                                                       <h6 class="badge badge-dark">{{ $counthariini_sakit }}</h6> siswa sakit
                                                    @endif<br>
                                                     @if($counthariini_alpa !== null)
                                                        <h6 class="badge badge-dark">{{ $counthariini_alpa }}</h6> siswa alpa
                                                    @endif

                                                
                        </div>
                        {{-- <h6 class="badge badge-info">{{ $mahasiswaHadir }}</h6> --}}
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <i data-feather="user-x" style="width: 100px; height: 40px"></i>
                        <div class="mt-2 font-weight-bold mb-1">Tidak Hadir</div>
                        {{-- <h6 class="badge badge-danger">{{ $mahasiswaTidakHadir }}</h6> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <x-alert />
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mahasiswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('kelas.store_absen') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $jadwal->id }}" name='jadwal_id'>
                                    {{-- <input type="hidden" value="{{ $absen->id }}" name='parent'>    --}}
                                    <h1> absen siswa tidak masuk</h1>
                                         <div class="my-2">
                                            <label for="name">Siswa</label>
                                                <select class="form-control" name="siswa_id">
                                                    <option>-----pilih siswa----</option>
                                                    @foreach($ruangan as $p)
                                                        <option value='{{ $p->siswa->id}}'> {{ $p->siswa->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                         <div class="my-2">
                                            <label for="name">status</label>
                                               <select class="form-control" name="status">
                                                        <option>------pilih alasan-----</option>
                                                        <option value="sakit">Sakit</option>
                                                        <option value="izin">izin</option>
                                                        <option value="alpa">alpa</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary mb-3">save</button>
                                </form>
                                    @foreach($ruangan as $p)
                                        <tr>
                                            <td>
                                                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('storage/images/'.$p->siswa->image)}}"> {{ $p->siswa->name }}   ( {{ $p->siswa->nisn }} )
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection