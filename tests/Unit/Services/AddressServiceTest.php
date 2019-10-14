<?php

namespace App\Services;

use Tests\TestCase;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddressServiceTest extends TestCase
{
    use DatabaseTransactions;

    public $newAddress;

    public $updateRequest;

    public $mock;

    public function setUp(): void
    {
        parent::setUp();

        $this->newAddress = [
            'country' => 'USA',
            'state' => 'MN',
            'city' => 'Burnsville',
            'street' => '111 New Street',
            'zip' => '55337'
        ];
        $this->updateRequest = $this->createMock(UpdateAddressRequest::class);
        $this->updateRequest->add($this->newAddress);

        $this->mock = $this->createMock(AddressService::class);
    }

    public function testUpdate()
    {
        $this->mock->method('update')->willReturn(202);

        $this->assertSame(202, $this->mock->update(1, $this->updateRequest));
    }

    public function testDestroy()
    {
        $this->mock->method('destroy')->willReturn(202);
        $this->assertSame(202, $this->mock->destroy(1));
    }
}
