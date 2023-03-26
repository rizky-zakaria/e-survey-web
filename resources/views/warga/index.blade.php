@extends('layouts.templates')

@section('content')
    <div class="card">
        <div class="card-header">
            Data Warga
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>KTP</th>
                        <th>Foto Diri</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $item->nama }}
                            </td>
                            <td>
                                {{ $item->nik }}
                            </td>
                            <td>
                                {{ $item->jk }}
                            </td>
                            <td>
                                {{ $item->tempat_lahir . ', ' . $item->tgl_lahir }}
                            </td>
                            <td>
                                {{ $item->pekerjaan }}
                            </td>
                            <td>
                                {{ $item->alamat . ', ' . $item->desa . ', ' . $item->kecamatan . ', ' . $item->kota }}
                                <br />
                                {{ $item->latitude . ' - ' . $item->longitude }}
                            </td>
                            <td>
                                <img src="{{ asset('uploads/img/ktp/' . $item->ktp) }}" alt="">
                            </td>
                            <td>
                                <img src="{{ asset('uploads/img/selfi/' . $item->selfi) }}" alt="">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>KTP</th>
                        <th>Foto Diri</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
