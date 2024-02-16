<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoulePermission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
class PermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'All_route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes = Route::getRoutes();
        foreach ($routes as $route )
        {
            $uri = $route->uri();
            if(strstr($uri, 'csrf')) continue;
            if(strstr($uri, '_')) continue;
            if(strstr($uri, 'api')) continue;
            Permission::create([
                'name' => $uri,
            ]);

        }

        $permissions = Permission::all();
        $adminRole = Role::where('role', 'admin')->first();
        $userRole = Role::where('role', 'user')->first();

        # admin permission

        foreach ($permissions as $permission) {
            RoulePermission::create([
                'role_id' => $adminRole->id,
                'permission_id' => $permission->id,
            ]);
        }


        #client permission



            RoulePermission::create(
                [
                    'role_id' => $clientRole->id,
                    'permission_id' => $route->id,
                ]
            );
        }



}
