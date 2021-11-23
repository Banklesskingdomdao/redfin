<?php

namespace Blk\LoanManagement;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Blk\LoanManagement\Skeleton\SkeletonClass
 */
class LoanManagementFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'loan-management';
    }
}
