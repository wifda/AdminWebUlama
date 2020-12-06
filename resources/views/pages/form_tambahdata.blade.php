@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'daftar_ulama'
])

@section('content')
    <div class="content">
        <div class="container" style="align:center">
        <div class="card" style="width:800px;">
            <div class="card-body ">
                <h4>Tambah Data Ulama <i class="fa fa-plus-circle"></i></h4>
                <hr>
                <form method="post" action="{{ route('page.tambahdata', 'form_tambahdata') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Ulama</label>
                        <input type="text" name="namaulama" class="form-control" placeholder="Nama Ulama">

                        @if($errors->has('namaulama'))
                            <div class="text-danger">
                                {{ $errors->first('namaulama')}}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Tahun Kelahiran (Masehi)</label>
                        <input type="text" name="tahunlahir" class="form-control" placeholder="Tahun Kelahiran">

                        @if($errors->has('tahunlahir'))
                            <div class="text-danger">
                                {{ $errors->first('tahunlahir')}}
                            </div>
                        @endif

                    </div>
                    
                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                        <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Kelahiran">

                        @if($errors->has('tempatlahir'))
                            <div class="text-danger">
                                {{ $errors->first('tempatlahir')}}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Biografi Ulama</label>
                        <textarea rows="50" cols="100" name="biografi" class="form-control" placeholder="Biografi">Biografi Ulama
                        </textarea>
                        @if($errors->has('biografi'))
                            <div class="text-danger">
                                {{ $errors->first('biografi')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-round" value="Tambahkan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection