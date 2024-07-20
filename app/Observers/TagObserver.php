<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class TagObserver
{
    /**
     * Handle the Tag "created" event.
     */
    public function created(): void
    {
       Cache::forget('tags');
    }

    /**
     * Handle the Tag "updated" event.
     */
    public function updated(): void
    {
       Cache::forget('tags');
    }

    /**
     * Handle the Tag "deleted" event.
     */
    public function deleted(): void
    {
       Cache::forget('tags');
    }

    /**
     * Handle the Tag "restored" event.
     */
    public function restored(): void
    {
       Cache::forget('tags');
    }

    /**
     * Handle the Tag "force deleted" event.
     */
    public function forceDeleted(): void
    {
       Cache::forget('tags');
    }
}
