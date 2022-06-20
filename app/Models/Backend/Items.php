<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable=[
        'item_code',
        'name',
        'description',
        'pic'

    ];
    use HasFactory;
}
