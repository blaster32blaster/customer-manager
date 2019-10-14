<?php

namespace App\Services;

use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerApiServiceTest extends TestCase
{
    use DatabaseTransactions;

    public $newCustomer;

    public $updateRequest;

    public $mock;

    public $response;

    public function setUp(): void
    {
        parent::setUp();

        $this->newCustomer = [
            'name' => 'BillyBob'
        ];
        $this->updateRequest = $this->createMock(UpdateCustomerRequest::class);
        $this->updateRequest->add($this->newCustomer);

        $this->mock = $this->createMock(CustomerApiService::class);

    }

    public function testIndex()
    {
        $this->mock->method('index')->willReturn(resolve(Response::class));

        $this->assertInstanceOf(Response::class, $this->mock->index());
    }

    public function testShow()
    {
        $this->mock->method('show')->willReturn(resolve(Response::class));

        $this->assertSame(200, $this->mock->show(1)->getStatusCode());
    }

    public function testUpdate()
    {
        $this->mock->method('update')->willReturn(resolve(Response::class));

        $this->assertSame(200, $this->mock->update(1, $this->updateRequest)->getStatusCode());
    }

    public function testDestroy()
    {
        $this->mock->method('destroy')->willReturn(202);

        $this->assertSame(202, $this->mock->destroy(1));
    }
}
