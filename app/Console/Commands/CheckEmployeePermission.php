<?php

namespace App\Console\Commands;

use App\Services\SecurityService;
use Exception;
use Illuminate\Console\Command;

class CheckEmployeePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:can {employee} {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check employee permission';

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
            $res = $security->hasEmployeePermission(
                $this->argument('employee'),
                $this->argument('permission')
            );
            if (true === $res) {
                $this->line('true');
            } else {
                $this->line('false');
            }
            exit(0);
        } catch (Exception $e) {
            $this->error($e->getMessage());
            exit(1);
        }
    }
}
