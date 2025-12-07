<?php
/**
 * Visita - Museum Model
 * File: app/Models/Museum.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_museum',
        'deskripsi',
        'alamat',
        'latitude',
        'longitude',
        'jam_operasional',
        'harga_tiket',
        'foto_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the attributes that should be searchable.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('nama_museum', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
    }
}