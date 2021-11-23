<?php

namespace Blk\Kyc;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Blk\Kyc\Skeleton\SkeletonClass
 */
class KycFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kyc';
    }
}
