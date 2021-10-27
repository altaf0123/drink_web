<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Traits\Functions;
use App\Models\OrderItem;

use Illuminate\Http\Request;

use DataTables;
use Auth;
use DB;
use Validator; 

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->fileExtensions = array('jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF');
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ord = Products::where('restaurant_id', Auth::user()->restaurant_id)
            ->paginate(8);
        return view('bar.products.list')
            ->with('records', $ord);
    }

    public function show($id)
    {
        $view = Products::where('id', $id)->first();
        return view('bar.products.show')
            ->with('records', $view);
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        
        if ($request->input())
        {
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            $files = $request->file('image');
            
            if (!empty($files)):
                
                $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);

                if(!in_array($ext, $this->fileExtensions)) {
                    return redirect()->back()->with('danger', 'File must be image JPEG or JPG or PNG or GIF.');
                    exit;
                }
                
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
            $data->restaurant_id = Auth::user()->restaurant_id;
            $data->cat_id = $request->cat_id;
            $data->description = $request->description;
            $data->type = $request->type;
            if ($data->save())
            {
                return redirect()
                    ->back()
                    ->with('success', 'Updated');
            }
        }

        return view('bar.products.show');
    }

    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        
        if ($request->input())
        {
            if ($valid->fails()) 
            {
                return redirect()->back()->with('danger', 'Fill the required fields please.');
            }
            
            
            if (!empty($files)):
                
                $files = $request->file('image');
                $ext = pathinfo($files->getClientOriginalName(), PATHINFO_EXTENSION);
    
                if(!in_array($ext, $this->fileExtensions)) {
                    return redirect()->back()->with('danger', 'File must be image JPEG, JPG, PNG,GIF.');
                    exit;
                }
                
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
            $data->type = $request->type;
            if ($data->save())
            {
                return redirect()
                    ->back()
                    ->with('success', 'Product added');
            }
        }
        return view('bar.products.add');
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
            return view('bar.products.list', ['records'=>$orders]);
        }
        else
        {
            return view('bar.products.list');
        }
    }
    
}

?>