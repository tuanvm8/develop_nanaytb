<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\UserProfile\UserProfileRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Instruction;
use App\Models\Post;
use App\Models\Product;
use App\Models\Recruitment;
use App\Models\Slide;
use App\Models\Social;
use App\Models\Solution;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();

        $sliders = Slide::orderBy('position', 'ASC')->get();
        $address = Address::where('status', '=', 1)->get();
        $social = Social::orderBy('id', 'DESC')->first();
        $posts = Post::orderBy('id', 'DESC')->where('status', 1)->limit(6)->get();

        $mainContent = Category::where([['parent_id', null], ['status', 1]])->orderBy('id', 'asc')->limit(6)->get();

        $this->generateSignedUrls($sliders, $defaultBucket, 'image_url');
        $this->generateSignedUrls($posts, $defaultBucket, 'image');

        foreach ($mainContent as $category) {
            if ($category->image) {
                $object = $defaultBucket->object($category->image);
                $signedUrl = $object->signedUrl(now()->addHours(5));
                $category->image = $signedUrl;
            }
        }

        return view('user.home.index', [
            'sliders' => $sliders,
            'address' => $address,
            'social' => $social,
            'posts' => $posts,
            'mainContent' => $mainContent
        ]);
    }

    public function getProductList($categorySlug)
    {
        if ($categorySlug == 'danh-muc') {
            $category = Category::where('status', 1)->first();
        } else {
            $category = Category::where([['slug', $categorySlug], ['status', 1]])->first();
        }
        if (!$category) {
            return redirect()->route('index');
        }
        $category->image = getImageUrl($category->image);

        $products = $category->products()->paginate(15);
        return view('user.product.list', ['category' => $category, 'products' => $products]);
    }

    public function getProductDetail($categorySlug, $productSlug)
    {
        $category = Category::where([['slug', $categorySlug], ['status', 1]])->first();
        if (!$category) {
            return redirect()->route('index');
        }

        $product = Product::where([['slug', $productSlug], ['status', 1]])->first();
        if (!$product) {
            return redirect()->route('index');
        }

        $checkProduct = $category->products()->where('m_products.id', $product->id)->first();
        if (!$checkProduct) {
            return redirect()->route('index');
        }

        $otherProducts = Product::where([['status', 1], ['id', '!=', $product->id]])->inRandomOrder()->limit(3)->get();

        return view('user.product.detail', ['category' => $category, 'product' => $product, 'otherProducts' => $otherProducts]);
    }

    public function getInstructionList()
    {
        $instructions = Instruction::where('status', 1)->orderBy('id', 'desc')->paginate(15);
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.instruction.list', ['instructions' => $instructions, 'products' => $products]);
    }

    public function getInstructionDetail($instructionSlug)
    {
        $instruction = Instruction::where([['status', 1], ['slug', $instructionSlug]])->first();
        if (!$instruction) {
            return redirect()->route('index');
        }

        $newestInstructions = Instruction::where([['status', 1], ['id', '!=', $instruction->id]])->orderBy('updated_at', 'desc')->limit(5)->get();
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.instruction.detail', ['instruction' => $instruction, 'newestInstructions' => $newestInstructions, 'products' => $products]);
    }

    public function getPostList()
    {
        $posts = Post::where('status', 1)->orderBy('id', 'desc')->paginate(15);
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.post.list', ['posts' => $posts, 'products' => $products]);
    }

    public function getPostDetail($postSlug)
    {
        $post = Post::where([['status', 1], ['slug', $postSlug]])->first();
        if (!$post) {
            return redirect()->route('index');
        }

        $newestPosts = Post::where([['status', 1], ['id', '!=', $post->id]])->orderBy('updated_at', 'desc')->limit(5)->get();
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.post.detail', ['post' => $post, 'newestPosts' => $newestPosts, 'products' => $products]);
    }

    public function getIntroduce()
    {
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        $sliders = Slide::orderBy('position', 'ASC')->get();
        $this->generateSignedUrls($sliders, $defaultBucket, 'image_url');
        return view('user.introduce.list', ['sliders' => $sliders]);
    }

    public function getContact(Request $request)
    {
        $product = null;
        if ($request->has('san-pham')) {
            $product = Product::where([['slug', $request->input('san-pham')], ['status', 1]])->first();
            if (!$product) $product = null;
        }
        return view('user.contact.form', ['product' => $product]);
    }

    public function postContactForm(ContactRequest $request)
    {
        try {
            DB::beginTransaction();
            $contact = new Contact();
            $contact->fill($request->all());
            $contact->save();
            DB::commit();
            return redirect()->route('contact.index')->with('messageSuccess', config('message.contact_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('contact.index')->with('messageError', config('message.contact_failed'));
        }
    }

    public function getSolutionList()
    {
        $solution = Solution::where('status', 1)->orderBy('id', 'desc')->paginate(15);
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.solution.list', ['solutions' => $solution, 'products' => $products]);
    }

    public function getSolutionDetail($solutionSlug)
    {
        $solution = Solution::where([['status', 1], ['slug', $solutionSlug]])->first();
        if (!$solution) {
            return redirect()->route('index');
        }

        $newestPosts = Solution::where([['status', 1], ['id', '!=', $solution->id]])->orderBy('updated_at', 'desc')->limit(5)->get();
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.solution.detail', ['solution' => $solution, 'newestPosts' => $newestPosts, 'products' => $products]);
    }

    public function getRecruitmentList(Request $request)
    {
        $type = $request->input('type');
        $location = $request->input('location');
        $query = Recruitment::query();
    
        if ($type && $type != '0') {
            $query->where('type', $type);
        }
    
        if ($location && $location != '0') {
            $query->where('location', $location);
        }
        $items = $query->where('status', 1)->orderBy('id', 'desc')->paginate(15);
    
        $filterData = Recruitment::select(['type', 'location'])->where('status', 1)->get();
        $typeArray = [];
        $locationArray = [];
        foreach ($filterData as $item) {
            $typeItems = is_array($item->type) ? $item->type : explode(',', $item->type);
            $locationItems = is_array($item->location) ? $item->location : explode(',', $item->location);
    
            $typeArray = array_merge($typeArray, $typeItems);
            $locationArray = array_merge($locationArray, $locationItems);
        }     
        $typeArray = array_map(function($value) {
            return ucwords(trim(strtolower($value)));
        }, $typeArray);
    
        $locationArray = array_map(function($value) {
            return ucwords(trim(strtolower($value)));
        }, $locationArray);
    
        $typeArray = array_values(array_unique($typeArray));
        $locationArray = array_values(array_unique($locationArray));
    
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.recruitment.list', [
            'items' => $items, 
            'products' => $products,
            'types' => $typeArray,
            'locations' => $locationArray,
            'selectedType' => $type,
            'selectedLocation' => $location
        ]);
    }
    

    public function postUserProfileForm(UserProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            $item = new UserProfile();
            $data = $request->all();

            if ($request->file('file')) {
                $file = $request->file('file');
                $newFileName = $file->getClientOriginalName() . '-' . rand(0, 999);
                $data['file'] = $file->storeAs('uploads', $newFileName, 'public');
            }

            $item->fill($data);
            $item->save();
            DB::commit();
            return redirect()->route('recruitment.index')->with('messageSuccess', config('message.send_profile_succsee'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('recruitment.index')->with('messageError', config('message.send_profile_error'));
        }
    }

    public function getRecruitmentDetail($recruitmentSlug)
    {
        $item = Recruitment::where([['status', 1], ['slug', $recruitmentSlug]])->first();
        if (!$item) {
            return redirect()->route('index');
        }

        $newestPosts = Recruitment::where([['status', 1], ['id', '!=', $item->id]])->orderBy('updated_at', 'desc')->limit(5)->get();
        $products = Product::where('status', 1)->with('categories')->inRandomOrder()->limit(3)->get();
        return view('user.recruitment.detail', ['item' => $item, 'newestPosts' => $newestPosts, 'products' => $products]);
    }

    public function search(Request $request) {
        if (!isset($request['tu-khoa']) || empty($request['tu-khoa'])) return redirect()->route('index');
        $searchKey = $request['tu-khoa'];
        $data = Product::where('name', 'LIKE', '%' . $searchKey . '%')
                ->with('categories')
                ->whereHas('categories')
                ->paginate(15);
        return view('user.search.list', ['products' => $data, 'key' => $searchKey]);
    }

    public function getLogin()
    {
        try {
            if (Auth::guard('user')->check()) {
                if (Auth::guard('user')->user()->status == 2) {
                    return redirect()->route('dashboard.index');
                } else {
                    Auth::guard('user')->logout();
                    return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập');
                }
            }
            return view('user.login');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function postLogin(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('login')->withErrors($validator)->withInput();
            }

            $validatedData = $validator->validated();

            if (Auth::guard('user')->attempt(['first_name' => $validatedData['first_name'], 'password' => $validatedData['password']])) {
                if (Auth::guard('user')->user()->status == 2) {
                    return redirect()->route('dashboard.index');
                } else {
                    Auth::guard('user')->logout();
                    return redirect()->route('login')->with('messageError', 'Bạn không có quyền truy cập');
                }
            }

            DB::commit();

            return redirect()->route('login')->with('messageError', config('message.login_failed'))->withInput();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->back()->with('messageError', config('message.create_error'))->withInput()->with('method', 'register');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $userCustomer = new Customer();
            $userCustomer->email = $request->email;
            $userCustomer->fullname = $request->fullname;
            $userCustomer->phone = $request->phone;
            $userCustomer->password = bcrypt($request->register_password);
            $userCustomer->status = 2;
            $userCustomer->save();

            Auth::guard('user')->login($userCustomer);

            DB::commit();
            return redirect()->route('login')->with('messageSuccess', config('message.create_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->back()->with('messageError', config('message.create_error'))->withInput()->with('method', 'register');
        }
    }

    private function generateSignedUrls($items, $defaultBucket, $imageColumn)
    {
        foreach ($items as $item) {
            if ($item->$imageColumn) {
                $signedUrl = $defaultBucket->object($item->$imageColumn)->signedUrl(now()->addHours(5));
                $item->$imageColumn = $signedUrl;
            }
        }
    }
}
