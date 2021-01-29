<?php


namespace App\Services\Employee;

use App\Services\Permissions\PermissionListInterface;
use Doctrine\Common\Collections\ArrayCollection;

class ArrayEmployeeList implements EmployeeListInterface
{

    /**
     * @var ArrayCollection
     */
    private $list;

    /**
     * @var PermissionListInterface
     */
    private $permissions;

    /**
     * ArrayEmployeeList constructor.
     *
     * @param PermissionListInterface $permissions
     */
    public function __construct(PermissionListInterface $permissions)
    {
        $this->permissions = $permissions;
        $this->list        = new ArrayCollection();
    }

    /**
     * Add employee
     *
     * @param EmployeeInterface $employee
     */
    public function addEmployee(EmployeeInterface $employee): void
    {
        if (false === $this->list->containsKey($employee->getName())) {
            $this->list->set(
                $employee->getName(),
                $employee
            );
        }
    }

    /**
     * Get employee by name
     *
     * @param string $name
     *
     * @return EmployeeInterface|null
     */
    public function getEmployeeByName(string $name)
    : ?EmployeeInterface
    {
        return $this->list->get($name);
    }

    /**
     * Get permissions
     *
     * @return PermissionListInterface
     */
    public function getPermissions()
    : PermissionListInterface
    {
        return $this->permissions;
    }


    /**
     * Get list of employees
     *
     * @return EmployeeInterface[]
     */
    public function getList()
    : array
    {
        return $this->list->toArray();
    }
}
