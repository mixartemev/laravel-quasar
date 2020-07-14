<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tariff;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TariffController
 */
class TariffControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $tariffs = factory(Tariff::class, 3)->create();

        $response = $this->get(route('tariff.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TariffController::class,
            'store',
            \App\Http\Requests\TariffStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $tariff = factory(Tariff::class)->make();

        $response = $this->post(route('tariff.store'), $tariff->toArray());

        $response->assertCreated();

        $tariffs = Tariff::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $tariffs);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $tariff = factory(Tariff::class)->create();

        $response = $this->get(route('tariff.show', $tariff));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TariffController::class,
            'update',
            \App\Http\Requests\TariffUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $tariff = factory(Tariff::class)->create();
        $update = factory(Tariff::class)->make();

        $response = $this->put(route('tariff.update', $tariff), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $tariff = factory(Tariff::class)->create();

        $response = $this->delete(route('tariff.destroy', $tariff));

        $response->assertOk();

        $this->assertDeleted($tariff);
    }
}
