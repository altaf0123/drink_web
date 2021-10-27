<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealsUser extends Model
{
    use HasFactory;
    protected $table = 'update_deal_alert';
    
    public function deals_user()
    {
        return $this->belongsTo(Deals::class);
    }
}
