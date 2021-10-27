<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Products;

use App\Models\Table;

use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toPending($id)
    {
        $usr = User::find($id);
        $usr->account_status = 'active';
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toComplete($id)
    {
        $usr = User::find($id);
        $usr->account_status = 'suspended';
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }
    
    public function toVerifyPending($id)
    {
        $usr = User::find($id);
        $usr->account_verified = 0;
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

    public function toVerifyComplete($id)
    {
        $usr = User::find($id);
        $usr->account_verified = 1;
        $usr->save();
        return redirect()->back()->with('success', 'Status Changed');
    }

}