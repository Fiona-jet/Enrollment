<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins_tbl'; // Specify your custom table name
    
    protected $fillable = [
        'admin_name', 'admin_email', 'admin_password', 'admin_phone',
    ];
}
