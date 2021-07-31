@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Frozen Food</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Tambah Transaksi</a>
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
                 <th> Nama Barang</th>
                 <th> Jenis Transaksi</th>
                 <th> Jumlah Transaksi</th>
                 <th width="280px"class="text-center">Action</th>
                    </tr>        
                @foreach ($transaksis as $transaksi)
                                    <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $transaksi->nama_barang }}</td>
                                        <td>{{ $transaksi->jenis_transaksi }}</td>
                                        <td>{{ $transaksi->jumlah_transaksi }}</td>
                                        <td class="text-center">
                                        <form action="{{ route('transaksis.destroy',$transaksi->id) }}" method="POST">
                                             <a class="btn btn-primary btn-sm" href="{{ route('transaksis.edit',$transaksi->id) }}">Edit</a>
                                             @csrf
                                              @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
