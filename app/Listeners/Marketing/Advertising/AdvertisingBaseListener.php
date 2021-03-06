<?php

namespace Orchid\Listeners\Marketing\Advertising;

use Orchid\Http\Forms\Marketing\Advertising\AdvertisingMainForm;

class AdvertisingBaseListener
{
    /**
     * @return string
     */
    public function handle()
    {
        return AdvertisingMainForm::class;
    }
}
