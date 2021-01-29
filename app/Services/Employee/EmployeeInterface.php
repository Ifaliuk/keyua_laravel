<?php


namespace App\Services\Employee;

use App\Services\Permissions\PermissionInterface;
use App\Services\Permissions\PermissionListInterface;

interface EmployeeInterface
{

    public function getName(): string;

    public function addPermission(PermissionInterface $permission);

    public function getPermissions(): PermissionListInterface;
}
