<?php

namespace App\Console\Commands;

use App\Services\DataStorage;
use App\Services\SecurityService;
use Illuminate\Console\Command;
use Throwable;

class PermissionsList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get permissions list';

    /**
     * Execute the console command.
     *
     * @param DataStorage $storage
     *
     * @return mixed
     */
    public function handle(DataStorage $storage)
    {
        try {
            $permissions = $storage->getPermissionStorage()
                ->getList();
            if (true === empty($permissions)) {
                $this->info("Permissions list is empty");
            } else {
                foreach ($permissions as $permission) {
                    $this->line("- {$permission->getDescription()} [{$permission->getName()}]");
                }
            }
            exit(0);
        } catch (Throwable $e) {
            $this->error($e->getMessage());
            exit(1);
        }
    }
}
