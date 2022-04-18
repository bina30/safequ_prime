<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use App\Models\Seller;
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
            $products = $products->where('seller_id', $request->user_id);
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
            $master_product = Product::where('name', 'like', '%' . $request->search . '%')->get();
            $masterProductId = [];
            foreach ($master_product AS $item) {
                $masterProductId[] = $item->id;
            }
            if (!empty($masterProductId)) {
                $products = $products
                    ->whereIn('product_id', $masterProductId);
            }
            $sort_search = $request->search;
        }

        $products = $products->paginate(15);

        return view('communities.products.index', compact('products', 'type', 'col_name', 'query', 'sort_search', 'seller_id'));
    }

    public function product_create()
    {
        $products = Product::where('wholesale_product', 1)
            ->get();

        $sellers = Seller::get();

        return view('communities.products.create', compact('products', 'sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function product_store(Request $request)
    {
        (new WholesaleService)->stock_add($request);
        return redirect()->route('community_products');
    }

    public function product_edit(Request $request, $id)
    {
        $product_stock = ProductStock::findOrFail($id);

        $products = Product::where('wholesale_product', 1)
            ->get();

        $sellers = Seller::get();

        return view('communities.products.edit', compact('product_stock', 'products', 'sellers'));
    }

    public function product_update(Request $request, $id)
    {
        (new WholesaleService)->stock_update($request, $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function product_destroy($id)
    {
        (new WholesaleService)->stock_destroy($id);
        return back();
    }

    public function bulk_product_delete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $product_id) {
                $this->product_destroy($product_id);
            }
        }

        return 1;
    }
}
