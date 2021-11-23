<?php

namespace Blk\User;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Blk\User\Skeleton\SkeletonClass
 */
class UserFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'user';
    }
}
