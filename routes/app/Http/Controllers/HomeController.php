<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Requests\form;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\form;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportFile;
use App\Models\addProduct;
use App\Models\addCategories;
use App\Models\addsubCategories;
use App\Models\addtocart;
use App\Models\order;
use App\Models\formdata;
use App\Models\dummy;
use App\Event\UserInfo;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use App\Imports\ImportUser;
use File;

// use Maatwebsite\Excel\load;

// use Excel;

use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Auth\Redirect;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $user = Auth::user();
        
        $logid=$user->id;
        $loginrole=$user->role;

        if($loginrole==1){
            
        $data= User::where('id','!=', $logid)
        ->get();
        
        // echo("$data");
        return view('adminhome');
        }
        if($loginrole==0){
        $data= User::where('id','=', $logid)
        ->get();
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
            
        // dd($subcategory);
        // echo "<pre>";print_r($subcategory);die;
        return view('home',['data'=>$data , 'categorydata'=>$categorydata,'subcategory'=>$subcategory]);
        }
    }
    public function  deleteuser($id){
        User::where('id','=',$id)->delete();
        $user = Auth::user();
        $logid=$user->id;
        $data= User::where('id','!=', $logid)
        ->get();
        echo $data;
        //return redirect()->back()->getTargetUrl('admin/adminhome');
        return Redirect('userlist')->with('data', $data);
       
        // return view('admin/adminhome',['data'=>$data]);
        // echo"hello";
        
    }


    public function AdminDrashBoard(){
        return view('/adminhome');
    }

    public function showCategories()
    {
        return view('addCategories');
    }
    public function Categories(Request $request)
    {
        $categoryImage = $request->file('categoryImage');
        $categoryImageSaveAsName = time() . Auth::id() . "-profile." . $categoryImage->getClientOriginalExtension();

        $upload_path = 'categoriesimages/';
        $profile_image_url = $upload_path .''. $categoryImageSaveAsName;
        
        $success = $categoryImage->move($upload_path, $categoryImageSaveAsName);

            $addcat= new addCategories();
            
            $addcat->categoryName     = $request->categoryName;
            
            $addcat->categoryImage = $success;
            $addcat->save();
            return Redirect('addCategories');
    }

    public function showsubCategories()
    {
        $categorydata= addCategories::all();
        return view('addsubCategories',['categorydata'=>$categorydata]);
    }

    public function subCategories(Request $request)
    {
        

            $addsubcat= new addsubCategories();
            $addsubcat->categoryid = $request->category;
            $addsubcat->subcategoryName     = $request->subcategoryName;
            $addsubcat->save();
            return Redirect('addsubCategories');
    }

    public function show()
    {
        $user = Auth::user();
        $logid=$user->id;
        $data= User::where('id','!=', $logid)->get();
        return view('userlist',['data'=>$data]);   
    }


    public function showProduct()
    {
        $categorydata= addCategories::all();
        return view('addProduct', ['categorydata'=>$categorydata]);
    }

    public function catagoryChoose($id)
    {
        try 
        {
            if ($id != "") 
            {
                $subCategories =  addsubCategories::where('categoryid','=',$id)->get();
                $response = array ('status' => true, 'response' => $subCategories);
            } 
            
            else 
            
            {
                $response = array('status' => false, 'message' => 'Please select a category first!');    
            }

            return $response;
        } 

        catch (\Exception $ex) {
            return $ex->getMessage();
        }


    }
    public function SaveProduct(Request $request)
    {
    
        $productImage = $request->file('productImage');
        $productImageSaveAsName = time() . Auth::id() . "-profile." . $productImage->getClientOriginalExtension();

        $upload_path = 'productimages/';
        $profile_image_url = $upload_path .''. $productImageSaveAsName;
        
        $success = $productImage->move($upload_path, $productImageSaveAsName);

            $add= new addProduct();
            

            $add->categoryid     = $request->get('category');
            $add->subcategoryid     = $request->get('sub_category');
            

            $add->productName     = $request->productName;
            $add->shortDescription     = $request->shortDescription;
            $add->longDescription     = $request->longDescription;
            $add->productVariety     = $request->productVariety;
            $add->productQuantity     = $request->productQuantity;
            $add->productPrice     = $request->productPrice;
            $add->productImage = $success;
            $add->save();
            return Redirect('addProduct');
        
        

    }

    public function viewProduct()
    {
        
        $productdata= addProduct::all();
        
        
        return view('viewProduct',['productdata'=>$productdata]);   
       
    }



    public function viewProductpagenation()
    {
        
        $data= addProduct::paginate(5);
        
        
        return view('viewProductpagenation',['data'=>$data]);   
       
    }

    public function fetch_data(Request $request)
        {
          
            if($request->ajax())
            {
               
             $data = addProduct::paginate(5);
            //echo print_r($data);die('in die');
                return view('viewProductpagenation', compact('$data'))->render();
            }
        }


    public function pagenation_data(Request $request)
    {
        
        $data = addProduct::paginate(5);
        if ($request->ajax()) {
            return view('viewtable',compact('data'));
        }
        return view('pagination',compact('data'));
        
       
    }
    


    public function DeleteProduct($id)
    { 
        addProduct::where('id','=',$id)->delete();
        $productdata= addProduct::all();
        return Redirect('viewProduct')->with('productdata', $productdata);
    }
    public function ShowEditProduct($id)
    {    $categorydata= addCategories::all();
        $productdata= addProduct::where('id','=',$id)->get();
        // echo"$productdata";die();
        return view('editProduct',['productdata'=>$productdata],['categorydata'=>$categorydata]);
    }

    public function Editsubcategory($id){
        
        try 
        {
            if ($id != "") 
            {
                $subCategories =  addsubCategories::where('categoryid','=',$id)->get();
                $response = array ('status' => true, 'response' => $subCategories);
            } 
            
            else 
            
            {
                $response = array('status' => false, 'message' => 'Please select a category first!');    
            }

            return $response;
        } 

        catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function EditProduct(Request $request) 
    { 
    
        
        $productImage = $request->file('productImage');
        $productImageSaveAsName = time() . Auth::id() . "-profile." . $productImage->getClientOriginalExtension();

        $upload_path = 'productimages/';
        $product_image_url = $upload_path . $productImageSaveAsName;
        
        $success = $productImage->move($upload_path, $productImageSaveAsName);

        $prodata=addProduct::find($request->id);
       
        $prodata->categoryid     = $request->get('category');
        $prodata->subcategoryid     = $request->get('sub_category');

        $prodata->productName=$request->productName;
        $prodata->shortDescription=$request->shortDescription;
        $prodata->longDescription=$request->longDescription;
        $prodata->productVariety=$request->productVariety;
        $prodata->productQuantity=$request->productQuantity;
        $prodata->productPrice=$request->productPrice;
        $prodata->productImage=$success;                
        $prodata->save();
        return redirect('viewProduct');
       
    }


    ///user panel Functions


    public function user_show_category()
    {
        $categorydata= addCategories::all();
        // dd($categorydata);
        return view('home',['categorydata'=>$categorydata]);   
        //return view('home')->with('categorydata', $categorydata);
       
        
    }

    public function getProduct($subcat)
        {
            $productdata= addProduct::where('subcategoryid','=',$subcat)->get();
            $categorydata= addCategories::all();
            $subcategory = addCategories::with('getsub_categories')->get();
            $showsubcat= addsubCategories::where('id','=',$subcat)->get();
         //echo $showsubcat;die();
            return view('user_products',['productdata'=>$productdata , 'categorydata'=>$categorydata,'subcategory'=>$subcategory,'showsubcat'=>$showsubcat]);


        }

    public function view_product($id)
    {
        $viewproductdata= addProduct::where('id','=',$id)->get();
        //$productdata= addProduct::where('subcategoryid','=',$subcat)->get();
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
        //  $viewproductdata;die();
        return view('user_viewProducts',[ 'categorydata'=>$categorydata,'subcategory'=>$subcategory,'viewproductdata'=>$viewproductdata]);

    }    
    
    public function add_to_cart($id,Request $request)
    {  
        
        $user = Auth::user();
        $logid=$user->id;
        
        $viewproductdata= addProduct::where('id','=',$id)->get();
        
        //$productdata= addProduct::where('subcategoryid','=',$subcat)->get();
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
        //  $viewproductdata;die();
        $cart= new addtocart();
            
        $subcat     = $request->subcat;
        $showsubcat= addsubCategories::where('id','=',$subcat)->get();
        $productdata= addProduct::where('subcategoryid','=',$subcat)->get();

        $cart->loginid     =  $logid;
        $cart->productid     = $id;
        $subcat     = $request->subcat;
        //echo $subcat;die();
        $cart->productprice     = $request->proprice;
        $cart->productquantity     = $request->quantity;
        $cart->size     = $request->size;
        $cart->color     = $request->color;
        $cart->shade     = $request->shade;
        $cart->save();

        
        return view('user_products',[ 'categorydata'=>$categorydata,'subcategory'=>$subcategory,'viewproductdata'=>$viewproductdata,'showsubcat'=>$showsubcat,'productdata'=>$productdata]);

    }    

    public function view_cart()
    {
        
        //$productdata= addProduct::where('subcategoryid','=',$subcat)->get();
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
        // $pro = addProduct::with('getproduct')->get();
        $details=addtocart::with('getproduct','getlogindata')->get();
        //echo $details;die();
        // echo "<pre>";print_r($details);die;
        return view('user_addtocart',[ 'categorydata'=>$categorydata,'subcategory'=>$subcategory,'details'=>$details]);
    }


    public function remove_from_cart($id)
    {
        //echo $id;die();
        addtocart::where('id','=',$id)->delete();
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
        // $pro = addProduct::with('getproduct')->get();
        $details=addtocart::with('getproduct','getlogindata')->get();
        //echo $details;die();
        // echo "<pre>";print_r($details);die;
        
        return view('user_addtocart',[ 'categorydata'=>$categorydata,'subcategory'=>$subcategory,'details'=>$details]);

    }


    public function proceed_to_checkout()
    {
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
        $details=addtocart::with('getproduct','getlogindata')->get();
        return view('user_checkout',[ 'categorydata'=>$categorydata,'subcategory'=>$subcategory,'details'=>$details]);
    }

    public function save_order(Request $request)
    {
        //echo"uff";die();
        $user = Auth::user();
        $logid=$user->id;
        
        //$viewproductdata= addProduct::where('id','=',$id)->get();
        
        //$productdata= addProduct::where('subcategoryid','=',$subcat)->get();
        $categorydata= addCategories::all();
        $subcategory = addCategories::with('getsub_categories')->get();
        //  $viewproductdata;die();
        $orderdata= new order();
            
         $proid     = $request->proid;
         echo $proid;die();
         $subtotal     = $request->subtotal;

        // $orderdata->loginid     =  $logid;
        // $orderdata->productid     = $proid;
        // $subcat     = $request->subcat;
        //echo $subcat;die();
        
         $orderdata->loginid     = $logid;
        

        // $orderdata->productid     = $request->productid;
        // $orderdata->subtotal     = $request->subtotal;
        

        $orderdata->firstname     = $request->firstname;
        $orderdata->lastname     = $request->lastname;
        $orderdata->mobile     = $request->mobile;
        $orderdata->address1     = $request->address1;
        $orderdata->address2     = $request->address2;
        $orderdata->country     = $request->country;
        $orderdata->city     = $request->city;
        $orderdata->state     = $request->state;
        $orderdata->zipcode     = $request->zipcode;
        $orderdata->shipto     = $request->shipto;
        $orderdata->shipaddress1     = $request->shipaddress1;
        $orderdata->shipaddress2     = $request->shipaddress2;
        $orderdata->shipcountry     = $request->shipcountry;
        $orderdata->shipcity     = $request->shipcity;
        $orderdata->shipstate     = $request->shipstate;
        $orderdata->shipzipcode     = $request->shipzipcode;
        $orderdata->payment     = $request->payment;
        $orderdata->totalamount     = $subtotal;


        $orderdata->save();

        
        return view('home',[ 'categorydata'=>$categorydata,'subcategory'=>$subcategory]);

    }


    public function get_form()
    {
        return view('formdata');
    }

    public function set_form(form $request)
    {
        
       
        //return view('formdata');
        $validated = $request->validated();

        if (!$validated) {
            return redirect()->back()->withInput();
            }
        else{
        $formdata = new formdata();
        $formdata->name     = $request->name;
        $formdata->email     = $request->email;
        $formdata->password     = $request->password;
        $formdata->phonenumber     = $request->phonenumber;
        $formdata->save();
        $user = Auth::user();
        $id=$user->id;
        $user = formdata::find($id)->toArray();
        
        $email = $request->email;
        UserInfo::dispatch($user);
        return redirect('formdata');
        }    
            // finally store our user
            
    }

    public function get_formparsely()
    {
        return view('formdataparsely');
    }

    public function set_formparsely(Request $request)
    {
        
            if(request()->ajax())
            {
             $data = array(
              'name' => $request->get('name'),
              'email'   => $request->get('email'),
              'password'  => $request->get('password'),
              'phonenumber'  => $request->get('phonenumber')
             );
       
             DB::table('formdatas')->insert($data);
       
             return response()->json(['success' => 'Data Added']);
            }
           
    }

    public function get_tableData(Request $request)
    {
           
        // if ($request->ajax()) {
        //     $data = dummy::select('*')->get();
            
        //     return Datatables::of($data)
               
        //         ->make(true);
        // }
        // return Datatables::of($data)->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        if ($request->ajax()) {
            $data = dummy::select('*')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('dummydata');
    }


    public function exportdata()
    {
       
        return Excel::download(new ExportFile, 'add_Products.csv');
    }


    public function messages()
    {
        // $firebase = (new Factory)
        //     // ->withServiceAccount(__DIR__.'/laravel-firebase-demo-8b4b1-firebase-adminsdk-pki1t-9b49e1c4bf.json')
        //     ->withDatabaseUri('https://healthadvisory-954a5-default-rtdb.firebaseio.com');
 
        // $database = $firebase->createDatabase();
 
        // $blog = $database
        // ->getReference('blog');
 
        // echo '<pre>';
        // print_r($blog->getvalue());
        // echo '</pre>';
        // $blog->push([
        //     'discription' => 'Post title',
        //     'name' => 'This should probably be longer.'
        //     ]);
        //     print_r($blog->getvalue());
        return view('ShowMessages');
    }

    public function Showwhether()
    {
        // dd('hii');
        // Excel::import($yourImport)
        // $data = Excel::import('public/exleFile/Active Employees Address List 02.27.2023 - Copy (1).xlsx', function($reader) {})->get();
        // // $rows = Excel::import('exleFile/Active Employees Address List 02.27.2023 - Copy (1).xlsx')->get();
        // echo"<pre>";print_r($data);die();
        return view('Showwhether');
    }
    public function submitData(Request $request)
    {
        // dd("hii");
        if($request->hasFile('file')){
            // dd("hii");
            $path = $request->file('file')->getRealPath();
            // dd($path);
            $row=0;$arr=[];
            $Files = public_path('exelFile/excelFile.csv');
            if (($handle = fopen($Files, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    echo "<p> $num fields in line $row: <br /></p>\n";
                    echo"<pre>";print_r($data[1]);
                    User::where('name',$data[1])->update(['country' => $data[12]]);
                    $row++;
                    //if($row == 0) continue;
                    // dd($data[1]);
                    for ($c=0; $c < $num; $c++) {
                        
                        echo $data[$c] . "<br />\n";
                    }
            }
            fclose($handle);
        }
        // dd($arr);
            // $data = Excel::import(new ImportUser,'excel.xlsx')->get();
            // Excel::import($request->file('file'), function ($reader) {

            //     foreach ($reader->toArray() as $row) {
            //         echo $row;
            //         // User::firstOrCreate($row);
            //     }
            // });
            // dd($data);
            echo $data;die("dead");
            // echo"<pre>";print_r($data);die();
            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
    
                    echo $value;
                }
                
            }
        }
    }

    public function livewireTable()
    {
        return view('TestLivewire');
    }

    public function ShowTailwindForm()
    {
        dd("here");
    }

    public function ShowAutoComplete()
    {
        return view('AutoComplete');
    }

}
