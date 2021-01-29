<?php

namespace App\Console\Commands;

use App\Services\DataStorage;
use App\Services\SecurityService;
use Illuminate\Console\Command;
use Throwable;

class EmployeeList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get employees list';

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
            $employees = $storage->getEmployeeStorage()
                ->getList();
            if (true === empty($employees)) {
                $this->info("Employees list is empty");
            } else {
                foreach ($employees as $employee) {
                    $this->line("- {$employee->getName()}");
                }
            }
            exit(0);
        } catch (Throwable $e) {
            $this->error($e->getMessage());
            exit(1);
        }
    }
}
