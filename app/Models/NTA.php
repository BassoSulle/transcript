<?php

namespace App\Models;

use App\Models\AwardClassification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NTA extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function award(){

        return $this->belongsTo(AwardClassification::class);
    }
    
}