<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
 
class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data produk',
            'data' => $produks
        ], 200);
    }
 
    public function create()
    {
        return view('produks.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|numeric',
            'nama_supplier' => 'required',
            'nama_barang' => 'required',
            'rasa' => 'required',
            'jumlah_barang' => 'required|numeric',

        ]);
 
        Produk::create($request->all());
 
        return redirect()->route('produks.index')
                        ->with('success','produk created successfully.');
    }
 
    public function show(int $id)
    {
        
        $produk = Produk::findOrFail($id); 
        return view('produks.show',['produk' => $produk]);
    }
 
    public function edit(int $id)
    {
        $produk = Produk::findOrFail($id); 
        return view('produks.edit',['produk' => $produk]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|numeric',
            'nama_supplier' => 'required',
            'nama_barang' => 'required',
            'rasa' => 'required',
            'jumlah_barang' => 'required|numeric',
        ]);
 
        $produk = Produk::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $produk->update($dataResult);

        return redirect('produks')
                        ->with('success','produk updated successfully');
    }
 
    public function destroy($id)
    {
        $produk = Produk :: where ('id',$id)->first();
     
         $produk -> delete(); return redirect()->route('produks.index');

                with('success','produk deleted successfully');
        
    }
}