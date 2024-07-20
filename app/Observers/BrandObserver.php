<?php

namespace App\Observers;

use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Cache;

class BrandObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Brand "created" event.
     */
    public function created(): void
    {
        Cache::forget('brands');
    }
    
    /**
     * Handle the Brand "updated" event.
     */
    public function updated(): void
    {
        Cache::forget('brands');
    }
    
    /**
     * Handle the Brand "deleted" event.
     */
    public function deleted(): void
    {
        Cache::forget('brands');
    }
    
    /**
     * Handle the Brand "restored" event.
     */
    public function restored(): void
    {
        Cache::forget('brands');
    }
    
    /**
     * Handle the Brand "force deleted" event.
     */
    public function forceDeleted(): void
    {
        Cache::forget('brands');
    }
}
