<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Supplier;
 
class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(5);
 
        return view('suppliers.index',compact('suppliers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('suppliers.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier '=>'required',
            'kode_supplier'=>'required|numeric|uniqe',
            'minimal_stok'=>'required|numeric',
            'harga_jual'=>'required|numeric',
        ]);
 
        Supplier::create($request->all());
 
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier created successfully.');
    }
 
    public function show(Supplier $post)
    {
        return view('suppliers.show',compact('post'));
    }
 
    public function edit(Supplier $post)
    {
        return view('suppliers.edit',compact('post'));
    }
 
    public function update(Request $request, Supplier $post)
    {
        $request->validate([
            'nama_supplier '=>'required',
            'kode_supplier'=>'required|numeric|uniqe',
            'minimal_stok'=>'required|numeric',
            'harga_jual'=>'required|numeric',
        ]);
 
        $post->update($request->all());
 
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier updated successfully');
    }
 
    public function destroy(Supplier $post)
    {
        $post->delete();
 
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier deleted successfully');
    }
}