@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Transaksi</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('transaksis.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data transaksi.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('transaksis.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Transaksi:</strong>
                <input type="text" name="jenis_transaksi" class="form-control" placeholder="Jenis Transaksi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Transaksi:</strong>
                <input type="string" name="jumlah_transaksi" class="form-control" placeholder="Jumlah Transaksi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
 
    </form>
@endsection