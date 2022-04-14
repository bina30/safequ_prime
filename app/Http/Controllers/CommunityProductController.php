<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use App\Models\User;
use Illuminate\Http\Request;
use CoreComponentRepository;
use App\Models\Category;
use App\Models\Product;
use App\Services\WholesaleService;
use Auth;

class CommunityProductController extends Controller
{
    public function community_products(Request $request)
    {
        $type = 'Seller';
        $col_name = null;
        $query = null;
        $sort_search = null;
        $seller_id = null;

        $products = ProductStock::with('product')->orderBy('created_at', 'desc');

        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }

        if ($request->type != null) {
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }
        if ($request->search != null) {
            $products = $products
                ->where('name', 'like', '%' . $request->search . '%');
            $sort_search = $request->search;
        }

        $products = $products->paginate(15);

        return view('communities.products.index', compact('products', 'type', 'col_name', 'query', 'sort_search', 'seller_id'));
    }

    public function product_create_admin()
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        $users = User::where('user_type', 'seller')
            ->where('banned', 0)
            ->get();

        return view('wholesale.products.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function product_store_admin(Request $request)
    {
        (new WholesaleService)->store($request);
        return redirect()->route('wholesale_products.all');
    }

    public function product_edit_admin(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->digital == 1) {
            return redirect('digitalproducts/' . $id . '/edit');
        }

        $lang = $request->lang;
        $tags = json_decode($product->tags);
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        $users = User::where('user_type', 'seller')
            ->where('banned', 0)
            ->get();

        return view('wholesale.products.edit', compact('product', 'categories', 'tags', 'lang', 'users'));
    }

    public function product_update_admin(Request $request, $id)
    {
        (new WholesaleService)->update($request, $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function product_destroy_admin($id)
    {
        (new WholesaleService)->destroy($id);
        return back();
    }
}
