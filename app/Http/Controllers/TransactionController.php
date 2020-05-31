<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Http\Resources\Transaction as TransactionResource;
use App\Http\Resources\TransactionCollection;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TransactionCollection
     */
    public function index(Request $request)
    {
        $transactions = Transaction::all();

        return new TransactionCollection($transactions);
    }

    /**
     * @param \App\Http\Requests\TransactionStoreRequest $request
     * @return \App\Http\Resources\Transaction
     */
    public function store(TransactionStoreRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return new TransactionResource($transaction);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Transaction $transaction
     * @return \App\Http\Resources\Transaction
     */
    public function show(Request $request, Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * @param \App\Http\Requests\TransactionUpdateRequest $request
     * @param \App\Transaction $transaction
     * @return \App\Http\Resources\Transaction
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        $transaction->update([]);

        return new TransactionResource($transaction);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transaction $transaction)
    {
        $transaction->delete();

        return response()->noContent(200);
    }
}
