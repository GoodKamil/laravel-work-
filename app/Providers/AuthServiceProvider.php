<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineUserRoleGate('isBoss',UserRole::BOSS);
        $this->defineUserRoleGate('isMngr',UserRole::MNGR);
        $this->defineUserRoleGate('isWrkr',UserRole::WRKR);
        $this->defineIsBossOrMngrGate();
    }

    private function defineUserRoleGate(string $name, string $poziom_dostepu): void
    {
        Gate::define($name, function (User $user) use ($poziom_dostepu) {
            return $user->position->poziom_dostepu == $poziom_dostepu;
        });
    }

    private function defineIsBossOrMngrGate(): void
    {
        Gate::define('isBossOrMngr', function (User $user){
            return in_array($user->position->poziom_dostepu,[UserRole::MNGR,UserRole::BOSS]);
        });
    }
}
