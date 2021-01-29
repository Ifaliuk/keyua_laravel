<?php

namespace App\Console\Commands;

use App\Services\SecurityService;
use Illuminate\Console\Command;
use Throwable;

class GetEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:employee {employee}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get employee information';

    /**
     * Execute the console command.
     *
     * @param SecurityService $security
     *
     * @return mixed
     */
    public function handle(SecurityService $security)
    {
        try {
            $permissions = $security->getEmployeePermissions(
                $this->argument('employee')
            );
            if (true === empty($permissions)) {
                $this->info("Employee doesn't have permissions");
            } else {
                foreach ($permissions as $permission) {
                    $this->line("- {$permission->getDescription()}");
                }
            }
            exit(0);
        } catch (Throwable $e) {
            $this->error($e->getMessage());
            exit(1);
        }
    }
}
