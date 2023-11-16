<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class SiteController extends Controller
{
    public function index($slug = "")
    {
        // $args=[
        //     ['status','=',1],
        //     ['parent_id','=',0]
        // ];
        // $list_category=Category::where($args)->orderBy('sort_order')->get();
        // return view('frontend.home');
        if ($slug == '') {
            return $this->home();
        } else {
            $link = Link::where('slug', $slug)->first();
            if ($link != null) {
                $type = $link->type;
                switch ($type) {
                    case 'category':
                        return $this->product_category($slug);
                    case 'brand':
                        return $this->product_brand($slug);
                    case 'topic':
                        return $this->post_topic($slug);
                    case 'page':
                        return $this->post_page($slug);
                }
            } else {
                $product = Product::where([['slug', '=', $slug], ['status', '=', 1]])->first();
                if ($product != null) {
                    return $this->product_detail($product);
                } else {
                    $post = Post::where([['slug', '=', $slug], ['status', '=', 1], ['type', '=', 'post']])->first();
                    if ($post != null) {
                        return $this->post_detail($post);
                    } else {
                        return $this->error_404($slug);
                    }
                }
            }
        }
    }
    private function home()
    {
        $list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
            ->orderBy('sort_order', 'desc')
            ->get();
        return view('frontend.home', compact('list_category'));
    }
    public function products()
    {
        $list_product = Product::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('frontend.products', compact('list_product'));
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function news()
    {
        return view('frontend.news');
    }
    public function introduce()
    {
        return view('frontend.introduce');
    }
}
