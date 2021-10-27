<?php
namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Traits\Functions;
use App\Models\OrderItem;
use DataTables;
use Auth;
use DB;

class ProductsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ord = Products::where('restaurant_id', Auth::user()->restaurant_id)
            ->paginate(8);
        return view('manager.products.list')
            ->with('records', $ord);
    }

    public function show($id)
    {
        $view = Products::where('id', $id)->first();
        return view('manager.products.show')
            ->with('records', $view);
    }

    public function update(Request $request, $id)
    {
        if ($request->input())
        {
            $files = $request->file('image');
            if (!empty($files)):
                $image = singleFileUpload($request->file('image') , request()
                    ->segment(2) , $files->getClientOriginalName());
                $name = $files->getClientOriginalName();
            else:
                $name = $request->prod_img;
            endif;
            $data = Products::find($id);
            $data->name = $request->name;
            $data->price = $request->price;
            $data->picture = $name;
            $data->restaurant_id = $request->restaurant_id;
            $data->cat_id = $request->cat_id;
            $data->description = $request->description;
            if ($data->save())
            {
                return redirect()
                    ->back()
                    ->with('success', 'Updated');
            }
        }

        return view('manager.products.show');
    }

    public function create(Request $request)
    {
        if ($request->input())
        {
            $files = $request->file('image');
            
            if (!empty($files)):
                $image = singleFileUpload($request->file('image') , request()
                    ->segment(2) , $files->getClientOriginalName());
                $name = $files->getClientOriginalName();
            else:
                $name = "";
            endif;
            

            $data = new Products();
            $data->name = $request->name;
            $data->price = $request->price;
            $data->picture = $name;
            $data->restaurant_id = Auth::user()->restaurant_id;
            $data->cat_id = $request->cat_id;
            $data->description = $request->description;
            if ($data->save())
            {
                return redirect()
                    ->back()
                    ->with('success', 'Product added');
            }
        }
        return view('manager.products.add');
    }

    public function remove($id)
    {
        $view = Products::where('id', $id)->delete();
        return redirect()
            ->back()
            ->with('success', 'Deleted');
    }

    public static function search(Request $request)
    {
        if(isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            $orders = DB::table('products')
            ->where('name','LIKE','%'.$search_text.'%')
            ->where('restaurant_id','=', Auth::user()->restaurant_id)
            ->paginate(8)
            ->withQueryString();
            return view('manager.products.list', ['records'=>$orders]);
        }
        else
        {
            return view('manager.products.list');
        }
    }
}

?>