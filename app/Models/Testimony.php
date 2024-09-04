<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'comp_position',
        'email',
        'message',
    ];

    public function toggleApproved(){
        
        $this->approved = !$this->approved;
        $this->update();
    }
}
