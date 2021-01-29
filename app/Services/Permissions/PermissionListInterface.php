<?php

namespace App\Services\Permissions;

interface PermissionListInterface
{

    public function addPermission(PermissionInterface $permission);

    public function removePermissionByName(string $name);

    public function getPermissionByName(string $name): ?PermissionInterface;

    public function hasPermissionByName(string $name): bool;

    public function hasPermission(PermissionInterface $permission): bool;

    /**
     * @return PermissionInterface[]
     */
    public function getList(): array;
}
