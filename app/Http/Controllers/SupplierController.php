<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Supplier;
 
class SupplierController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(5);
 
        return view('produks.index',compact('produks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('produks.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'no'=>'required|numeric',
            'nama_supplier '=>'required',
            'kode_supplier'=>'required|numeric',
            'minimal_stock'=>'required|numeric',
            'harga_jual'=>'required|numeric'
        ]);
 
        Produk::create($request->all());
 
        return redirect()->route('produks.index')
                        ->with('success','Produk created successfully.');
    }
 
    public function show(Produk $post)
    {
        return view('produks.show',compact('post'));
    }
 
    public function edit(Produk $post)
    {
        return view('produks.edit',compact('post'));
    }
 
    public function update(Request $request, Produk $post)
    {
        $request->validate([
            'no'=>'required',
            'nama_supplier '=>'required',
            'kode_supplier'=>'required',
            'minimal_stock'=>'required',
            'harga_jual'=>'required'
        ]);
 
        $post->update($request->all());
 
        return redirect()->route('produks.index')
                        ->with('success','Produk updated successfully');
    }
 
    public function destroy(Produk $post)
    {
        $post->delete();
 
        return redirect()->route('produks.index')
                        ->with('success','Produk deleted successfully');
    }
}