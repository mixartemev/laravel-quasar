<?php

namespace Tests\Feature\Http\Controllers;

use App\Deal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DealController
 */
class DealControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $deals = factory(Deal::class, 3)->create();

        $response = $this->get(route('deal.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DealController::class,
            'store',
            \App\Http\Requests\DealStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $deal = factory(Deal::class)->make();

        $response = $this->post(route('deal.store'), $deal->toArray());

        $response->assertCreated();

        $deals = Deal::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $deals);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $deal = factory(Deal::class)->create();

        $response = $this->get(route('deal.show', $deal));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DealController::class,
            'update',
            \App\Http\Requests\DealUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $deal = factory(Deal::class)->create();
        $update = factory(Deal::class)->make();

        $response = $this->put(route('deal.update', $deal), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $deal = factory(Deal::class)->create();

        $response = $this->delete(route('deal.destroy', $deal));

        $response->assertOk();

        $this->assertDeleted($deal);
    }
}
