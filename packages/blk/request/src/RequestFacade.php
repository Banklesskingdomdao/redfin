<?php

namespace Blk\Request;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Blk\Request\Skeleton\SkeletonClass
 */
class RequestFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'request';
    }
}
