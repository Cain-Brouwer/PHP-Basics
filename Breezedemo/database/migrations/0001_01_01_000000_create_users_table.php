<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->createUsersTable();
        $this->createPasswordResetTokensTable();
        $this->createSessionsTable();
    }

    private const USERS_TABLE = 'users';

    private const PASSWORD_RESET_TOKENS_TABLE = 'password_reset_tokens';

    private const SESSIONS_TABLE = 'sessions';

    private const ROLE_NAME_LENGTH = 20;

    private const IP_ADDRESS_LENGTH = 45;

    private function createUsersTable(): void
    {
        Schema::create(self::USERS_TABLE, function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('rolename', self::ROLE_NAME_LENGTH)
                ->default('patient')->nullable(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    private function createPasswordResetTokensTable(): void
    {
        Schema::create(self::PASSWORD_RESET_TOKENS_TABLE, function (Blueprint $table): void {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    private function createSessionsTable(): void
    {
        Schema::create(self::SESSIONS_TABLE, function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', self::IP_ADDRESS_LENGTH)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
