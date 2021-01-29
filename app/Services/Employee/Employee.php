<?php


namespace App\Services\Employee;

use App\Services\Permissions\PermissionInterface;
use App\Services\Permissions\PermissionListInterface;

class Employee implements EmployeeInterface
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var PermissionListInterface
     */
    private $permissions;


    /**
     * Employee constructor.
     *
     * @param string                  $name
     * @param PermissionListInterface $permissions
     */
    public function __construct(string $name, PermissionListInterface $permissions)
    {
        $this->name = $name;
        $this->permissions = $permissions;
    }

    /**
     * @return string
     */
    public function getName()
    : string
    {
        return $this->name;
    }

    /**
     * @param PermissionInterface $permission
     */
    public function addPermission(PermissionInterface $permission): void
    {
        $this->permissions->addPermission($permission);
    }

    /**
     * @return PermissionListInterface
     */
    public function getPermissions()
    : PermissionListInterface
    {
        return $this->permissions;
    }
}
