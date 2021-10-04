<?php

namespace Tests\Api;

use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ApiTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $appUrl = env('app_url');
        URL::forceRootUrl("{$appUrl}/api");
    }
}
