<?php

namespace App\Services;

use App\Services\Employee\Employee;
use App\Services\Employee\EmployeeListInterface;
use App\Services\Permissions\Permission;
use App\Services\Permissions\PermissionListInterface;

class DataStorage
{
    /**
     * @var PermissionListInterface
     */
    private $permissionStorage;

    /**
     * @var EmployeeListInterface
     */
    private $employeeStorage;

    /**
     * DataStorage constructor.
     */
    public function __construct()
    {
        $dataFile = storage_path('data.json');
        if (false === file_exists($dataFile)) {
            return;
        }
        $data = json_decode(
            file_get_contents($dataFile),
            true
        );
        if (false === is_array($data)) {
            $data = [];
        }
        $this->createPermissionStorage(
            $data['permissions'] ?? []
        );
        $this->createEmployeeStorage(
            $data['employees'] ?? []
        );
    }

    private function createPermissionStorage($data)
    : void
    {
        $this->permissionStorage = app(PermissionListInterface::class);
        if (false === is_array($data)) {
            return;
        }
        foreach ($data as $datum) {
            if (false === isset($datum['name'])
                || false === is_string($datum['name'])
                || false === isset($datum['description'])
                || false === is_string($datum['description'])
            ) {
                continue;
            }
            $this->permissionStorage->addPermission(
                new Permission(
                    $datum['name'],
                    $datum['description']
                )
            );
        }
    }

    private function createEmployeeStorage($data)
    : void
    {
        $this->employeeStorage = app(EmployeeListInterface::class);
        if (false === is_array($data)) {
            return;
        }
        foreach ($data as $datum) {
            if (false === isset($datum['name'])
                || false === is_string($datum['name'])
                || false === isset($datum['permissions'])
                || false === is_array($datum['permissions'])
            ) {
                continue;
            }
            $employee = app(Employee::class, ['name' => $datum['name']]);
            foreach ($datum['permissions'] as $permissionName) {
                if (false === is_string($permissionName)) {
                    continue;
                }
                $permission = $this->permissionStorage->getPermissionByName($permissionName);
                if (null !== $permission) {
                    $employee->addPermission($permission);
                }
            }
            $this->employeeStorage->addEmployee($employee);
        }
    }

    /**
     * @return PermissionListInterface
     */
    public function getPermissionStorage()
    : PermissionListInterface
    {
        return $this->permissionStorage;
    }

    /**
     * @return EmployeeListInterface
     */
    public function getEmployeeStorage()
    : EmployeeListInterface
    {
        return $this->employeeStorage;
    }
}
