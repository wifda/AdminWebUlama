@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'biografi'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url()->current() }}">
                <input type="text" name="keyword" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-primary btn-round"><i class="nc-icon nc-zoom-split"></i></button>
            </form>
        </div>
    </div>
    
    <div class="row">
    @foreach($ulama as $u)
        <div class="col-md-6">
            <div class="card" style="height: 320px;">
                <div class="card-header" style="height: 120px; padding-top: 30px;">
                    <div class="col-md-8 ml-auto mr-auto text-center" >
                        <h7 class="card-title" style="font-weight: bold;">{{ $u->nama_ulama }}</h7>
                    </div>
                </div>
                <hr>
                <div class="card-body  ml-auto mr-auto text-center"style="padding-buttom: 50px;">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <p>{{ $u->biografi }}</p>
                    </div>
                    <a href="#" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="{{route('page.index', 'form_updatedata')}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="#" class="btn btn-danger" onclick="return confirm('Hapus data ulama ini?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $ulama->links() }}
</div>
@endsection