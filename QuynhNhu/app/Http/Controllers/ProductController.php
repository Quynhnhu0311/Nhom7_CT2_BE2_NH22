<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Rating;
use DB;

class ProductController extends Controller
{
    function detail_product($id) {
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();

        $detail_product = DB::table('products')->join('protypes','protypes.id','=','products.type_id')
                                                ->join('manufactures','manufactures.id','=','products.manu_id')
                                                ->where('products.id',$id)->get();

        foreach($detail_product as $key => $value) {
            $type_id = $value->type_id;
            $product_id = $value->id;
        }

        $related_product = DB::table('products')->join('protypes','protypes.id','=','products.type_id')
                                                ->join('manufactures','manufactures.id','=','products.manu_id')
                                                ->where('protypes.id',$type_id)->get();

        $rating = DB::table('ratings')->where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        return view('product')->with('type_product',$type_product)
                                ->with('manu_product',$manu_product)
                                ->with('detail_product',$detail_product)
                                ->with('related_product',$related_product)
                                ->with('rating',$rating);
    }

    function load_comment(Request $request) {
        $product_id = $request->product_id;
        $comment = DB::table('comments')->where('comment_product_id',$product_id)->get();
        $output = '';
        foreach($comment as $key => $cmt){
            //$output .= '
            echo  '<ul class="reviews">
                    <li>
                        <div class="review-heading">
                            <h5 class="name">'.$cmt->comment_name.'</h5>
                            <p class="date">'.$cmt->created_at.'</p>';
                            // <div class="review-rating">';
                            //         if($cmt->rating == 1)
                            //             echo '<i class="fa fa-star"></i>
                            //                 <i class="fa fa-star-o empty"></i>
                            //                 <i class="fa fa-star-o empty"></i>
                            //                 <i class="fa fa-star-o empty"></i>
                            //                 <i class="fa fa-star-o empty"></i>';
                            //         elseif($cmt->rating == 2){
                            //             echo '<i class="fa fa-star"></i>
                            //                 <i class="fa fa-star"></i>
                            //                 <i class="fa fa-star-o empty"></i>
                            //                 <i class="fa fa-star-o empty"></i>
                            //                 <i class="fa fa-star-o empty"></i>';
                            //         }elseif($cmt->rating == 3){
                            //             echo '<i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star-o empty"></i>
                            //             <i class="fa fa-star-o empty"></i>';
                            //         }elseif($cmt->rating == 4){
                            //             echo '<i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star-o empty"></i>';
                            //         }elseif($cmt->rating == 5){
                            //             echo '<i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>
                            //             <i class="fa fa-star"></i>';
                            //         }

                            // echo '</div>
                    echo '</div>
                        <div class="review-body">
                            <p>'.$cmt->comment.'</p>
                        </div>
                    </li>
                </ul>
            ';
        }
    }

    function send_comment(Request $request) {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $comment['created_at'] = now();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->save();
    }

    function insert_rating(Request $request) {
        $data = $request->all();
        $rating = new Rating;
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
}
