<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

#[Fillable(['name', 'email', 'password', 'rolename'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function sp_GetAllUsers(int $userId)
    {
        return DB::select('CALL SP_GetAllUsers(?)', [$userId]);
    }

    public function sp_GetUserById(int $id)
    {
        $result = DB::select('CALL Sp_GetUserById(?)', [$id]);

        return ! empty($result) ? $result[0] : null;
    }

    public function sp_GetAllUserroles()
    {
        return DB::select('CALL SP_GetAllUserroles()');
    }

    public function sp_DeleteUser(int $id): void
    {
        DB::statement('CALL Sp_DeleteUser(?)', [$id]);
    }

    public function sp_UpdateUser(int $id, string $rolename): void
    {
        DB::statement('CALL Sp_UpdateUser(?, ?)', [$id, $rolename]);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
