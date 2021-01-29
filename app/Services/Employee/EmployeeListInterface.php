<?php


namespace App\Services\Employee;

use App\Services\Permissions\PermissionListInterface;

interface EmployeeListInterface
{

    public function addEmployee(EmployeeInterface $employee);

    public function getEmployeeByName(string $name): ?EmployeeInterface;

    public function getPermissions(): PermissionListInterface;

    /**
     * @return EmployeeInterface[]
     */
    public function getList(): array;
}
