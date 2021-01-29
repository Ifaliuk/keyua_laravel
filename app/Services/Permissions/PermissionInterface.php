<?php

namespace App\Services\Permissions;

interface PermissionInterface
{

    public function getName(): string;

    public function getDescription(): string;
}
