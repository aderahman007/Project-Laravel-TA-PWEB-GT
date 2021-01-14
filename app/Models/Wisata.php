<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $fillable = ['wisata', 'layanan', 'descripsi', 'alamat', 'link_maps', 'foto'];
}
