<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Transaksi;
 
class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);
 
        return view('transaksis.index',compact('transaksis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
 
    public function show(Transaksi $post)
    {
        return view('transaksis.show',compact('post'));
    }
 
    public function edit(Transaksi $post)
    {
        return view('transaksis.edit',compact('post'));
    }
 
    public function update(Request $request, Transaksi $post)
    {
        $request->validate([
            'nama_barang '=>'required|uniqe',
            'jenis_transaksi'=>'required',
            'jumlah_transaksi'=>'required|numeric',
        ]);
 
        $post->update($request->all());
 
        return redirect()->route('transaksis.index')
                        ->with('success','transaksi updated successfully');
    }
 
    public function destroy(Transaksi $post)
    {
        $post->delete();
 
        return redirect()->route('transaksis.index')
                        ->with('success','transaksi deleted successfully');
    }
}