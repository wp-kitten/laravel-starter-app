<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role_id',
        'last_seen',
        'is_blocked',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
        'is_blocked' => 'boolean',
    ];

    /**
     * Retrieve the reference to the Relation between the current user and its role
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo( Role::class );
    }

    /**
     * Check to see whether the current user has a specific role
     * @param array|string $roles
     * @return bool
     */
    public function isInRole( $roles ): bool
    {
        //#! Transform to array if not an array
        $roles = ( is_array( $roles ) ? $roles : func_get_args() );
        if ( empty( $roles ) ) {
            return false;
        }
        foreach ( $roles as $roleName ) {
            if ( $this->role->name == $roleName ) {
                return true;
            }
        }
        return false;
    }


}
