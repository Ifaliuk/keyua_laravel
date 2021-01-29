<?php


namespace App\Services\Permissions;

class Permission implements PermissionInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;


    /**
     * AbstractPermission constructor.
     *
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
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
     * @return string
     */
    public function getDescription()
    : string
    {
        return $this->description;
    }
}
