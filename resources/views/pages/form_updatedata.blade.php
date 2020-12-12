@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'daftar_ulama'
])

@section('content')
    <div class="content">
        <div class="container">
        <div class="card" style="width:800px;">
            <div class="card-body ">
                <h4>Edit Data Ulama <i class="fa fa-pencil"></i></h4>
                <hr>
                <form method="post" action="/ulama/updateform">
                    {{ csrf_field() }}
                   
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $ulama->ulama_id }}">
                        <label>Nama Ulama</label>
                        <input type="text" name="nama_ulama" required="required" class="form-control" placeholder="Nama Ulama" value="{{ $ulama->nama_ulama }}">

                        @if($errors->has('nama_ulama'))
                            <div class="text-danger">
                                {{ $errors->first('nama_ulama')}}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Tahun Kelahiran (Masehi)</label>
                        <input type="number" name="tahun_lahir" required="required" class="form-control" placeholder="Tahun Kelahiran" value="{{ $ulama->tahun_lahir }}">

                        @if($errors->has('deskripsi'))
                            <div class="text-danger">
                                {{ $errors->first('tahun_lahir')}}
                            </div>
                        @endif

                    </div>
                    
                    <div class="form-group">
                        <label>Tempat Kelahiran</label>
                        <input type="text" name="tempat_lahir" required="required" class="form-control" placeholder="Tempat Kelahiran" value="<?php echo "$ulama[tempat_lahir]" ?>">

                        @if($errors->has('tempat_lahir'))
                            <div class="text-danger">
                                {{ $errors->first('tempat_lahir')}}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Biografi Ulama</label>
                        <textarea rows="50" cols="100" name="biografi" required="required" class="form-control" placeholder="Biografi"><?php echo "$ulama[biografi]" ?>
                        </textarea>
                        @if($errors->has('biografi'))
                            <div class="text-danger">
                                {{ $errors->first('biografi')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-round" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection