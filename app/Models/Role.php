<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasUuids, HasFactory;

    protected $dateFormat = 'U';

    protected $fillable = [
        'parent_id',
        'name',
        'guard_name',
    ];

    protected $hidden = [
        'guard_name',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];

    public $rules = [
        'parent_id' => 'required|uuid',
        'name' => 'required|string|between:1,254',
        'guard_name' => 'required|string|between:1,254',
    ];

    public function parent()
    {
        return $this->belongsTo(Role::class, 'parent_id');
    }
}
