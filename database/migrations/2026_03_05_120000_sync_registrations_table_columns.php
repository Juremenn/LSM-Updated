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
        if (! Schema::hasTable('registrations')) {
            return;
        }

        Schema::table('registrations', function (Blueprint $table) {
            if (! Schema::hasColumn('registrations', 'full_name')) {
                $table->string('full_name')->nullable();
            }

            if (! Schema::hasColumn('registrations', 'birth_date')) {
                $table->string('birth_date')->nullable();
            }

            if (! Schema::hasColumn('registrations', 'gender')) {
                $table->string('gender')->nullable();
            }

            if (! Schema::hasColumn('registrations', 'address')) {
                $table->string('address')->nullable();
            }

            if (! Schema::hasColumn('registrations', 'phone')) {
                $table->string('phone')->nullable();
            }

            if (! Schema::hasColumn('registrations', 'email')) {
                $table->string('email')->nullable();
            }

            if (! Schema::hasColumn('registrations', 'status')) {
                $table->string('status')->default('pending');
            }
        });

        if (! Schema::hasColumn('registrations', 'created_at') || ! Schema::hasColumn('registrations', 'updated_at')) {
            Schema::table('registrations', function (Blueprint $table) {
                if (! Schema::hasColumn('registrations', 'created_at') && ! Schema::hasColumn('registrations', 'updated_at')) {
                    $table->timestamps();
                } elseif (! Schema::hasColumn('registrations', 'created_at')) {
                    $table->timestamp('created_at')->nullable();
                } elseif (! Schema::hasColumn('registrations', 'updated_at')) {
                    $table->timestamp('updated_at')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Intentionally left empty to avoid dropping live columns that may already contain data.
    }
};

