<?php

namespace Tests\Feature\Http\Controllers;

use App\Server;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServerController
 */
class ServerControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $servers = factory(Server::class, 3)->create();

        $response = $this->get(route('server.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServerController::class,
            'store',
            \App\Http\Requests\ServerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $server = factory(Server::class)->make();

        $response = $this->post(route('server.store'), $server->toArray());

        $response->assertCreated();

        $servers = Server::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $servers);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $server = factory(Server::class)->create();

        $response = $this->get(route('server.show', $server));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServerController::class,
            'update',
            \App\Http\Requests\ServerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $server = factory(Server::class)->create();
        $update = factory(Server::class)->make();

        $response = $this->put(route('server.update', $server), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $server = factory(Server::class)->create();

        $response = $this->delete(route('server.destroy', $server));

        $response->assertOk();

        $this->assertDeleted($server);
    }
}
