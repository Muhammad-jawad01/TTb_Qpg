<?php

namespace App\Traits;


use Auth;
use App\Scopes\BranchScope;

trait BranchTrait
{

    protected static function boot()
    {
        parent::boot();
        // static::creating(function ($model) {
        //     if (\Auth::hasUser()) {
        //         if (!Auth::user()->hasRole('Super Admin')) {
        //             $model->department_id = Auth::User()->department_id;
        //         }
        //     }
        // });

        static::addGlobalScope(new BranchScope);
    }
}