<?php

namespace App\Services\Permissions;

use Doctrine\Common\Collections\ArrayCollection;

class ArrayPermissionList implements PermissionListInterface
{

    /**
     * @var ArrayCollection
     */
    private $list;

    /**
     * PermissionStorage constructor.
     */
    public function __construct()
    {
        $this->list = new ArrayCollection();
    }

    /**
     * @param PermissionInterface $permission
     */
    public function addPermission(PermissionInterface $permission): void
    {
        if (false === $this->list->containsKey($permission->getName())) {
            $this->list->set(
                $permission->getName(),
                $permission
            );
        }
    }

    /**
     * @param string $name
     */
    public function removePermissionByName(string $name): void
    {
        $this->list->remove($name);
    }

    /**
     * @param string $name
     *
     * @return PermissionInterface|null
     */
    public function getPermissionByName(string $name): ?PermissionInterface
    {
        return $this->list->get($name);
    }

    /**
     * @return PermissionInterface[]
     */
    public function getList(): array
    {
        return $this->list->toArray();
    }

    public function hasPermissionByName(string $name)
    : bool
    {
        return $this->list->containsKey($name);
    }

    public function hasPermission(PermissionInterface $permission)
    : bool
    {
        return $this->list->contains($permission);
    }
}
