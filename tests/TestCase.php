<?php

namespace Hpolthof\Backblaze\Tests;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase {
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('filesystems.disks.b2', [
            'driver'         => 'b2',
            'accountId'      => env('B2_ACCOUNT_ID'),
            'applicationKey' => env('B2_APP_KEY'),
            'bucketName'     => env('B2_BUCKET'),
        ]);
    }
}