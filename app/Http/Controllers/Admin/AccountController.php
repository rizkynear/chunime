<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filter\AccountFilter;
use App\Http\Requests\Admin\AccountRequest;
use App\Models\Account;

class AccountController extends Controller
{
    public function index(Request $request, AccountFilter $filter)
    {
        $accounts = Account::latest()->paginate(10);

        if ($request->has('search')) {
            $accounts = Account::filter($filter)->latest()->paginate(10);
        }

        return view('admin.account.index')->with(compact('accounts'));
    }

    public function store(AccountRequest $request)
    {
        $account = new Account($request->input());

        $account->save();

        return back();
    }

    public function update(AccountRequest $request, Account $account)
    {
        $account->fill($request->all());

        $account->save();

        return back();
    }

    public function delete(Account $account)
    {
        $account->delete();

        return back();
    }
}
