<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class File extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'recipient_id', 'filename', 'path'];


    // Assuming your File model includes user_id and recipient_id
    public function sender() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recipient() {
        return $this->belongsTo(User::class, 'recipient_id');
    }
    public function sharedUsers()
    {
        return $this->belongsToMany(User::class, 'file_user');
    }

}
