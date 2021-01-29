<?php

namespace App\Services;

use Exception;

class SecurityService
{
    /**
     * @var DataStorage
     */
    private $dataStorage;

    /**
     * Security constructor.
     *
     * @param DataStorage $dataStorage
     */
    public function __construct(DataStorage $dataStorage)
    {
        $this->dataStorage = $dataStorage;
    }

    /**
     * Get employee permissions
     *
     * @param string $employeeName
     *
     * @return array
     * @throws Exception
     */
    public function getEmployeePermissions(string $employeeName)
    : array
    {
        $employee = $this->dataStorage->getEmployeeStorage()
            ->getEmployeeByName(
                $employeeName
            );
        if (null === $employee) {
            throw new Exception('Employee not found');
        }
        return $employee->getPermissions()
            ->getList();
    }

    /**
     * Check employee permission
     *
     * @param string $employeeName
     * @param string $permissionName
     *
     * @return bool
     * @throws Exception
     */
    public function hasEmployeePermission(string $employeeName, string $permissionName)
    : bool
    {
        $employee = $this->dataStorage->getEmployeeStorage()
            ->getEmployeeByName(
                $employeeName
            );
        if (null === $employee) {
            throw new Exception('Employee not found');
        }
        $permission = $this->dataStorage->getPermissionStorage()
            ->getPermissionByName(
                $permissionName
            );
        if (null === $permission) {
            throw new Exception('Permission not found');
        }
        return $employee->getPermissions()
            ->hasPermission($permission);
    }
}
