@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Frozen Food</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('suppliers.create') }}"> Tambah Supplier</a>
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
            <th>Nama Supplier</th>
            <th>Kode Supplier</th>
            <th>Minimal Stok</th>
            <th>Harga Jual</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($suppliers as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_supplier }}</td>
            <td>{{ $post->kode_supplier }}</td>
            <td>{{ $post->minimal_stok }}</td>
            <td>{{ $post->harga_jual }}</td>
            <td class="text-center">
                <form action="{{ route('suppliers.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('suppliers.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $suppliers->links() !!}
 
@endsection