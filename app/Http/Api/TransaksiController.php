<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
 
class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data transaksi',
            'data' => $transaksis
        ], 200);
    }
 
    public function create()
    {
        return view('transaksis.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang '=>'required|uniqe',
            'jenis_transaksi'=>'required',
            'jumlah_transaksi'=>'required|numeric',
        ]);
 
        Transaksi::create($request->all());
 
        return redirect()->route('transaksis.index')
                        ->with('success','transaksi created successfully.');
    }
 
    public function show(int $id)
    {
        
        $transaksi = Transaksi::findOrFail($id); 
        return view('transaksis.show',['transaksi' => $transaksi]);
    }
 
    public function edit(int $id)
    {
        $transaksi = Transaksi::findOrFail($id); 
        return view('transaksis.edit',['transaksi' => $transaksi]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang '=>'required|uniqe',
            'jenis_transaksi'=>'required',
            'jumlah_transaksi'=>'required|numeric',
        ]);
 
        $transaksi = Transaksi::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $transaksi->update($dataResult);

        return redirect('transaksis')
                        ->with('success','transaksi updated successfully');
    }
 
    public function destroy($id)
    {
        $transaksi = Transaksi :: where ('id',$id)->first();
     
         $transaksi -> delete(); return redirect()->route('transaksis.index');

                with('success','transaksi deleted successfully');
        
    }
}