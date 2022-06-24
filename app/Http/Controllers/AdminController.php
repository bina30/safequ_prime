<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Artisan;
use Cache;
use CoreComponentRepository;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard(Request $request)
    {
        CoreComponentRepository::initializeCache();
        $root_categories = Category::where('level', 0)->get();
        $cached_data = Cache::remember('cached_data', 3600, function () use ($root_categories) {

            $num_of_sale_data = null;
            $qty_data = null;
            foreach ($root_categories as $key => $category) {
                $category_ids = \App\Utility\CategoryUtility::children_ids($category->id);
                $category_ids[] = $category->id;

                $products = Product::with('stocks')->whereIn('category_id', $category_ids)->get();
                $qty = 0;
                $sale = 0;
                foreach ($products as $key => $product) {
                    $sale += $product->num_of_sale;
                    foreach ($product->stocks as $key => $stock) {
                        $qty += $stock->qty;
                    }
                }
                $qty_data .= $qty . ',';
                $num_of_sale_data .= $sale . ',';
            }
            $item['num_of_sale_data'] = $num_of_sale_data;
            $item['qty_data'] = $qty_data;

            $item['total_customers'] = User::where('user_type', 'customer')->where('email_verified_at', '!=', null)->count();
            $item['total_orders'] = Order::count();
            $item['total_sales'] = Order::sum('grand_total');
            $item['total_pending_payment'] = Order::where('payment_status', 'unpaid')->sum('grand_total');
            $item['community_data'] = Shop::whereIn('user_id', verified_sellers_id())->withCount('orders', 'customers')->get();


            return $item;
        });

        return view('backend.dashboard', compact('root_categories', 'cached_data'));
    }

    function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        flash(translate('Cache cleared successfully'))->success();
        return back();
    }
}
