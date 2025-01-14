<?php

namespace App\Http\Controllers\Frontend;
ini_set('max_execution_time',0);
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Facades\Hash;
use App\Models\BlogPost;

use App\Models\SubCategory;
use App\Models\SubSubCategory;

class IndexController extends Controller
{
    public function index(){
    	return view('frontend.index');
    }


    public function UserLogout(){
    	Auth::logout();
    	return Redirect()->route('login');
    }


    public function UserProfile(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.user_profile',compact('user'));
    }



    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);

    } // end method


    public function UserChangePassword(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
    }


    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


	}// end method



	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);

		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		// $color_hin = $product->product_color_hin;
		// $product_color_hin = explode(',', $color_hin);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		// $size_hin = $product->product_size_hin;
		// $product_size_hin = explode(',', $size_hin);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_size_en','relatedProduct'));

	}



	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}


  // Subcategory wise data
	public function SubCatWiseProduct($subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();

		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));

	}

  // Sub-Subcategory wise data
	public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();

		$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

		return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));

	}



    /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method

 // Product Seach
	public function ProductSearch(Request $request){
		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));

	}

	public function CategorySearch($id){
		$products = Product::where('category_id',$id)->get();
		$categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.product.search',compact('products','categories'));
	}

	// display E-pharmacy view
	public function pharmacyView(Request $request)
	{
		// $blogpost = BlogPost::latest()->get();

    	$categories = Category::where('identifier', 'Pharmacy')->orderBy('category_name_en','ASC')->get();
		
    	$products = Product::whereIn('category_id',$categories->pluck('id'))->where('status',1)->orderBy('id','DESC')->limit(30)->get();

    	$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();

		$featured = Product::whereIn('category_id',$categories->pluck('id'))->where('featured',1)->orderBy('id','DESC')->limit(10)->get();

    	// $pharmacy_hot_deals = Product::with('category')->where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(10)->get();
		// $hot_deals = $this->category_identifier($pharmacy_hot_deals, 'Pharmacy');

    	// $pharmacy_special_offer = Product::with('category')->where('special_offer',1)->orderBy('id','DESC')->limit(10)->get();
		// $special_offer = $this->category_identifier($pharmacy_special_offer, 'Pharmacy');

    	// $pharmacy_special_deals = Product::with('category')->where('special_deals',1)->orderBy('id','DESC')->limit(10)->get();
		// $special_deals = $this->category_identifier($pharmacy_special_deals, 'Pharmacy');

    	$skip_category_0 = Category::where('identifier','Pharmacy')->skip(0)->first();
		$skip_product_0 = [];
		if (!is_null($skip_category_0)) {
			$skip_product_0 = Product::whereIn('category_id',$categories->pluck('id'))->where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
		}

    	$skip_category_1 = Category::where('identifier','Pharmacy')->skip(1)->first();
		$skip_product_1 = [];
		if (!is_null($skip_category_1)) {
			$skip_product_1 =Product::whereIn('category_id',$categories->pluck('id'))->where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();
		}

		$paginated_products = Product::where('status',1)->whereIn('category_id',$categories->pluck('id'))->latest()->paginate(30);

    	// $skip_brand_1 = Brand::skip(1)->first();
		// $skip_brand_product_1 = [];
		// if (!is_null($skip_brand_1)){
		// 	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();
		// }

    	return view('frontend.e_pharmacy',compact('categories','sliders','products','featured','skip_category_0','skip_product_0','skip_category_1','skip_product_1','paginated_products'));
	}

		// display E-laboratory view
		public function laboratoryView(Request $request)
		{
			// $blogpost = BlogPost::latest()->get();
			$categories = Category::where('identifier', 'Laboratory')->orderBy('category_name_en','ASC')->get();

			$products = Product::whereIn('category_id',$categories->pluck('id'))->where('status',1)->orderBy('id','DESC')->limit(30)->get();
	
			$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
	
			$featured = Product::whereIn('category_id',$categories->pluck('id'))->where('featured',1)->orderBy('id','DESC')->limit(10)->get();
	
			// $pharmacy_hot_deals = Product::with('category')->where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(10)->get();
			// $hot_deals = $this->category_identifier($pharmacy_hot_deals, 'Pharmacy');
	
			// $pharmacy_special_offer = Product::with('category')->where('special_offer',1)->orderBy('id','DESC')->limit(10)->get();
			// $special_offer = $this->category_identifier($pharmacy_special_offer, 'Pharmacy');
	
			// $pharmacy_special_deals = Product::with('category')->where('special_deals',1)->orderBy('id','DESC')->limit(10)->get();
			// $special_deals = $this->category_identifier($pharmacy_special_deals, 'Pharmacy');
	
			$skip_category_0 = Category::where('identifier','Laboratory')->skip(0)->first();
			$skip_product_0 = [];
			if (!is_null($skip_category_0)) {
				$skip_product_0 = Product::whereIn('category_id',$categories->pluck('id'))->where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
			}
	
			$skip_category_1 = Category::where('identifier','Laboratory')->skip(1)->first();
			$skip_product_1 = [];
			if (!is_null($skip_category_1)) {
				$skip_product_1 = Product::whereIn('category_id',$categories->pluck('id'))->where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();
			}

			$paginated_products = Product::where('status',1)->whereIn('category_id',$categories->pluck('id'))->latest()->paginate(30);
			// dd($paginated_products);
	
			// $skip_brand_1 = Brand::skip(1)->first();
			// $skip_brand_product_1 = [];
			// if (!is_null($skip_brand_1)){
			// 	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();
			// }
	
			return view('frontend.e_laboratory',compact('categories','sliders','products','featured','skip_category_0','skip_product_0','skip_category_1','skip_product_1','paginated_products'));
		}

		public function consultView()
		{
			return view('frontend.e_consultation');
		}



}
