<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    use HasFactory;

    protected $fillable = [
          "user_id",
          "nominals",
          "unique_code",
          "status"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
