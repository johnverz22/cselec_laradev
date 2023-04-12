<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title','company','location','website', 'email','description','tags', 'logo']; 

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
}
