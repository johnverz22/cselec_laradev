<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title','company','location','website', 'email','description','tags', 'logo','user_id']; 

    public function scopeFilter($query, array $filters){
        if ($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'.$filters['tag'].'%');
        }

        if ($filters['search'] ?? false){
            $query->where('title', 'like', '%'.$filters['search'].'%')
                ->orWhere('description', 'like', '%'.$filters['search'].'%')
                ->orWhere('tags', 'like', '%'.$filters['search'].'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
