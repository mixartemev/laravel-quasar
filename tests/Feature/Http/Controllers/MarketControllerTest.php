<?php

namespace Tests\Feature\Http\Controllers;

use App\Market;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MarketController
 */
class MarketControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $markets = factory(Market::class, 3)->create();

        $response = $this->get(route('market.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MarketController::class,
            'store',
            \App\Http\Requests\MarketStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $market = factory(Market::class)->make();

        $response = $this->post(route('market.store'), $market->toArray());

        $response->assertCreated();

        $markets = Market::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $markets);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $market = factory(Market::class)->create();

        $response = $this->get(route('market.show', $market));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MarketController::class,
            'update',
            \App\Http\Requests\MarketUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $market = factory(Market::class)->create();
        $update = factory(Market::class)->make();

        $response = $this->put(route('market.update', $market), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $market = factory(Market::class)->create();

        $response = $this->delete(route('market.destroy', $market));

        $response->assertOk();

        $this->assertDeleted($market);
    }
}
