<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WatchVideoHistory;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function home()
    {
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        
        $items = Product::whereDate('date_product', today())
            ->orderBy('date_product', 'desc')
            ->limit(5)
            ->get();
        foreach ($items as $imageName) {
            $signedUrl = $defaultBucket->object($imageName->image)->signedUrl(now()->addHours(5));
            $imageName->image = $signedUrl;
        }

        return view('user.index', ['items' => $items]);
    }
    public function today_video()
    {
        $items = Product::whereDate('date_product', today())
            ->orderBy('date_product', 'desc')
            ->limit(5)
            ->get();
        return view('user.today_video', ['items' => $items]);
    }
    public function watch_videos($id)
    {
        $item = Product::whereDate('date_product', today())
            ->where('id', $id)
            ->first();

        $itemArr = Product::whereDate('date_product', today())
            ->where('id', '<>', $id)
            ->orderBy('date_product', 'desc')
            ->limit(4)
            ->get();

        // Kiểm tra nếu có bản ghi và lấy giá trị cột url
        $url = $item ? $item->url : null;
        $time = $item ? $item->date_product : null;
        $videoId = $item ? $item->videoId : null;
        return view('user.watch_videos', ['videoId' => $videoId, 'id' => $id, 'url' => $url, 'time' => $time, 'itemArr' => $itemArr]);
    }

    public function add_point(Request $request)
    {
        if (Auth::check()) {

            $user = Auth::user();
            $cash = $user->point;
            $status = false;

            $product = Product::whereDate('date_product', today())
                ->where('id',  $request->id)
                ->first();
            if ($product->id > 0) {
                $history = WatchVideoHistory::where('product_id',  $request->id)
                    ->where('user_id', $user->id)
                    ->first();
                if ($history == null) {
                    $addLog = new \App\Models\WatchVideoHistory();
                    $addLog->product_id = $request->id;
                    $addLog->user_id = $user->id;
                    $addLog->title = $product->title;
                    $addLog->url = $product->url;
                    $addLog->point = $product->point;
                    $addLog->user_name = $user->username;
                    $addLog->save();

                    $cash += $product->point;
                    $status = true;
                    User::where('id', $user->id)->update(['point' => $cash]);
                }
            }
            $response = [
                'status' => $status,
                'cash' => $cash,
            ];
        } else {
            $response = [
                'status' => 'false',
            ];
        }
        return response()->json($response);
    }
}
