<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
 
class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data supplier',
            'data' => $suppliers
        ], 200);
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
                        ->with('success','supplier created successfully.');
    }
 
    public function show(int $id)
    {
        
        $supplier = Supplier::findOrFail($id); 
        return view('suppliers.show',['supplier' => $supplier]);
    }
 
    public function edit(int $id)
    {
        $supplier = Supplier::findOrFail($id); 
        return view('suppliers.edit',['supplier' => $supplier]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier '=>'required',
            'kode_supplier'=>'required|numeric|uniqe',
            'minimal_stok'=>'required|numeric',
            'harga_jual'=>'required|numeric',
        ]);
 
        $supplier = Supplier::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $supplier->update($dataResult);

        return redirect('suppliers')
                        ->with('success','supplier updated successfully');
    }
 
    public function destroy($id)
    {
        $supplier = Supplier :: where ('id',$id)->first();
     
         $supplier -> delete(); return redirect()->route('suppliers.index');

                with('success','supplier deleted successfully');
        
    }
}