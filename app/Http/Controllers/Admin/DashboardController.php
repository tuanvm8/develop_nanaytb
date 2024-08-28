<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\Post;
use App\Models\Product;
use App\Models\Views;
use App\Models\ViewsPost;
use App\Models\ViewsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class DashboardController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) return redirect()->route('admin.dashboard.index');
        return view('admin.dashboard.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        
        if (Auth::guard('admin')->attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            if(Auth::guard('admin')->user()->status == 1 ) {
                return redirect()->route('admin.dashboard.index');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('messageError', 'Bạn không có quyền truy cập');;
            }   
        }
        return redirect()->route('admin.login')->with('messageError',  config('message.login_failed'))->withInput();
    }

    public function getLogOut()
    {
        if ( Auth::guard('admin')) {
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }

    public function getData() {
        return view('admin.dashboard.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TotalViewsCount = Views::sum('times');
        
        $newUserViewsCount = Views::where('times', 1)->count();
        $oldUserViewsCount = Views::where('times', '!=' ,1)->count();
        $newVisitorRate = 0;
        if ($oldUserViewsCount > 0) {
            $newVisitorRate = round(($newUserViewsCount/$oldUserViewsCount)*100, 2);
        }

//----------------------------------------------------------------

        $top10ProductViews = ViewsProduct::select('product_id', DB::raw('COUNT(*) as view_count'))
        ->groupBy('product_id')
        ->orderBy('view_count', 'DESC')
        ->limit(10)
        ->get()
        ->toArray();

        $top10ProductViewsLabel = array_map(function($item) {
            $productData = Product::find($item['product_id']);
            return $productData->name;
        }, $top10ProductViews);


        $top10ProductViewsData = array_map(function($item) {
            return $item['view_count'];
        }, $top10ProductViews);
//----------------------------------------------------------------

        $top5ProductViews = ViewsPost::select('post_id', DB::raw('COUNT(*) as view_count'))
        ->groupBy('post_id')
        ->orderBy('view_count', 'DESC')
        ->limit(10)
        ->get()
        ->toArray();

        $top5PostViewsLabel = array_map(function($item) {
            $postData = Post::find($item['post_id']);
            return $postData['name'];
        }, $top5ProductViews);


        $top5PostViewsData = array_map(function($item) {
            return $item['view_count'];
        }, $top5ProductViews);
//----------------------------------------------------------------

        $data = [
            'TotalViewsCount' => (int)$TotalViewsCount,
            'newVisitorRate' => $newVisitorRate,
            'top10ProductViewsLabel' => $top10ProductViewsLabel,
            'top10ProductViewsData' => $top10ProductViewsData,
            'top5PostViewsLabel' => $top5PostViewsLabel,
            'top5PostViewsData' => $top5PostViewsData,
        ];
        
        return view('admin.dashboard.index', ['data' => $data]);
    }

    public function createViews(Request $request) {
        $item = Views::where('ip_address', $request->ip())->first();
        if ($item) {
            $times = $item->times + 1;
            $data = [
                'times' => $times,
            ];

            try {
                DB::beginTransaction();
                $item->update($data);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error($th);
            }
        } else {
            $data = [
                'ip_address' => $request->ip(),
            ];

            try {
                DB::beginTransaction();
                $views = Views::create($data);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error($th);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
