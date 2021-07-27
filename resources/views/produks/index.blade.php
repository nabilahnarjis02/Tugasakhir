@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Frozen Food</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('produks.create') }}"> Create Produk</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Kode Barang</th>
            <th>Nama Supplier</th>
            <th>Nama Barang</th>
            <th>Rasa</th>
            <th>Jumlah Barang</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($produks as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->kode_barang }}</td>
            <td>{{ $post->nama_supplier }}</td>
            <td>{{ $post->nama_barang }}</td>
            <td>{{ $post->rasa }}</td>
            <td>{{ $post->jumlah_barang }}</td>
            <td class="text-center">
                <form action="{{ route('produks.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('produks.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $produks->links() !!}
 
@endsection