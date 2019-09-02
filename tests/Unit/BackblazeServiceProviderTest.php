<?php


use Hpolthof\Backblaze\BackblazeServiceProvider;
use Hpolthof\Backblaze\Tests\TestCase;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class BackblazeServiceProviderTest extends TestCase
{
    protected $serviceProvider;
    protected $file;

    public function setUp(): void
    {
        parent::setUp();

        $this->serviceProvider = new BackblazeServiceProvider(app());
        $this->serviceProvider->boot();

        $this->file = uniqid('test-');
    }

    /** @test */
    public function it_extends_laravel_service_provider()
    {
        $this->assertInstanceOf(ServiceProvider::class, $this->serviceProvider);
    }

    /** @test */
    public function it_adds_b2_to_disks()
    {
        $this->assertInstanceOf(FilesystemAdapter::class, Storage::disk('b2'));
    }

    /** @test */
    public function it_puts_data_in_a_bucket()
    {
        $result = Storage::disk('b2')->put($this->file, 'Test');

        $this->assertTrue($result);

        $this->assertEquals('Test', Storage::disk('b2')->get($this->file));
    }

    /** @test */
    public function it_deletes_a_file_from_bucket()
    {
        $result = Storage::disk('b2')->delete($this->file);
        $this->assertTrue($result);
    }

}