<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Produk extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'kode_barang', 'nama_supplier','nama_barang','rasa','jumlah_barang',
    ];
}