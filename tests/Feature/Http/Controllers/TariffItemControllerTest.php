<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TariffItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TariffItemController
 */
class TariffItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $tariffItems = factory(TariffItem::class, 3)->create();

        $response = $this->get(route('tariff-item.index'));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TariffItemController::class,
            'store',
            \App\Http\Requests\TariffItemStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $tariffItem = factory(TariffItem::class)->make();

        $response = $this->post(route('tariff-item.store'), $tariffItem->toArray());

        $response->assertCreated();

        $tariffItems = TariffItem::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $tariffItems);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $tariffItem = factory(TariffItem::class)->create();

        $response = $this->get(route('tariff-item.show', $tariffItem));

        $response->assertOk();
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TariffItemController::class,
            'update',
            \App\Http\Requests\TariffItemUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $tariffItem = factory(TariffItem::class)->create();
        $update = factory(TariffItem::class)->make();

        $response = $this->put(route('tariff-item.update', $tariffItem), $update->toArray());

        $response->assertOk();
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $tariffItem = factory(TariffItem::class)->create();

        $response = $this->delete(route('tariff-item.destroy', $tariffItem));

        $response->assertOk();

        $this->assertDeleted($tariffItem);
    }
}
