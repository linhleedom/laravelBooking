<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;
use App\Bill;
use App\Order;
use App\User;
use App\Province;
use App\District;
use App\Ward;
use App\Rating;
use App\Homestay;

class AccountController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $billHistory = Bill::where('user_id',$id)->where('status','!=','0')->paginate(3);
        $billBooking = Bill::where('user_id',$id)->where('status','0')->paginate(3);
        $user = User::find($id);
        $province = Province::all();
        $district = District::all();
        $ward = Ward::all();
        return view('user.pages.account',compact('billHistory','billBooking','user','id','province','district','ward'));
    }

    public function editName($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->back()->with(['edit_name'=>'success','massage'=>'Cập nhật thành công']);
    }

    public function editEmail($id, Request $request){
        $validator = Validator::make($request->all(),
            [
                'email'=>'required|email|unique:users,email',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không hợp lệ',
                'email.unique'=>'Email đã có người sử dụng',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'email');
        }
        $user = User::find($id);
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with(['edit_email'=>'success','massage'=>'Cập nhật thành công']);
    }

    public function editPassword($id, Request $request){
        $validator = Validator::make($request->all(),
            [
                'pass_old'=>'required|current_password',
                'pass_new'=>'required|min:8|max:20',
                'confirm_pass_new'=>'required|same:pass_new'
            ],
            [
                'pass_old.required'=>'Vui lòng nhập mật khẩu',
                'pass_old.current_password'=>'Mật khẩu cũ không chính xác',
                'pass_new.required'=>'Vui lòng nhập mật khẩu',
                'pass_new.min'=>'Mật khẩu phải dài hơn 8 kí tự',
                'pass_new.max'=>'Mật khẩu dài không quá 20 kí tự',
                'confirm_pass_new.required'=>'Vui lòng nhập mật khẩu xác nhận',
                'confirm_pass_new.same'=>'Mật khẩu xác nhận không đúng'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'password');
        }
        $user = User::find($id);
        $user->password = Hash::make($request->pass_new);
        $user->save();
        return redirect()->back()->with(['edit_pass'=>'success','massage'=>'Cập nhật thành công']);
    }

    public function editPhone($id, Request $request){
        $validator = Validator::make($request->all(),
            [
                'phone'=>'required|numeric|unique:users,phone',
            ],
            [
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
                'phone.unique'=>'Số điện thoại đã có người sử dụng',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'phone');
        }
        $user = User::find($id);
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with(['edit_phone'=>'success','massage'=>'Cập nhật thành công']);
    }

    public function editAvatar($id, Request $request){
        $validator = Validator::make($request->all(),
            [
                'avatar'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'avatar.required'=>'Vui lòng chọn 1 ảnh',
                'avatar.image'=>'File không đúng định dạng',
                'avatar.mimes'=>'File ảnh phải có đuôi jpeg,png,ipg,gif',
                'avatar.max'=>'File ảnh dung lượng vượt quá 2Mb',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'avatar');
        }
        $user = User::find($id);

        $image = $request->avatar;
        $filename = $image->getClientOriginalName();
        $image->move(public_path('uploads/avatar/'), $filename);
        $link = 'uploads/avatar/'.$filename;
        $user->avatar = $link;
        $user->update();
        return redirect()->back()->with(['edit_avatar'=>'success','massage'=>'Cập nhật thành công']);
    }

    public function getDistrict($id){
        $districts = District::where("matp",$id)->pluck("name","maqh");
        return response()->json($districts);
    }

    public function getWard($id){
        $wards = Ward::where("maqh",$id)->pluck("name","xaid");
        return response()->json($wards);
    }

    public function editAddress($id, Request $request){
        $user = User::find($id);
        
        if( $user->xaid == ""){
            if($request->wards == ""){
                return redirect()->back()->with(['edit_address'=>'fail','massage'=>'Vui lòng chọn xã/phường']);
            }else{
                if($user->address_detail == ""){
                    $user->xaid = $request->wards;
                    $user->address_detail = $request->address_detail;
                    $user->save();
                    return redirect()->back()->with(['edit_address'=>'success','massage'=>'Cập nhật thành công']);
                }else{
                    if($request->address_detail == ""){
                        $user->xaid = $request->wards;
                        $user->save();
                        return redirect()->back()->with(['edit_address'=>'success','massage'=>'Cập nhật thành công']);
                    }else{
                        $user->xaid = $request->wards;
                        $user->address_detail = $request->address_detail;
                        $user->save();
                        return redirect()->back()->with(['edit_address'=>'success','massage'=>'Cập nhật thành công']);
                    }
                }
            }
        }else{
            if($request->wards == ""){
                if($request->address_detail == ""){
                    return redirect()->back()->with(['edit_address'=>'fail','massage'=>'Vui lòng chọn xã/phường']);
                }else{
                    $user->address_detail = $request->address_detail;
                    $user->save();
                    return redirect()->back()->with(['edit_address'=>'success','massage'=>'Cập nhật thành công']);
                }
            }else{
                if($request->address_detail == ""){
                    $user->xaid = $request->wards;
                    $user->save();
                    return redirect()->back()->with(['edit_address'=>'success','massage'=>'Cập nhật thành công']);
                }else{
                    $user->xaid = $request->wards;
                    $user->address_detail = $request->address_detail;
                    $user->save();
                    return redirect()->back()->with(['edit_address'=>'success','massage'=>'Cập nhật thành công']);
                }
            }     
        }
    }

    public function rating($id, $bill_id, Request $request){
        $rating = new Rating;
        $rating->homestay_id = $request->homestay_id;
        $rating->user_id = $id;
        $rating->bill_id = $bill_id;
        $rating->point = $request->score;
        $rating->comment = $request->comment;
        $rating->status = 1;
        $rating->save();
        
        $point_homestay = Rating::where('homestay_id',$request->homestay_id)->avg('point');
        $homestay = Homestay::find($request->homestay_id);
        $homestay->point = $point_homestay;
        $homestay->update();
        
        return redirect()->back()->with(['rating'=>'success','massage'=>'Đã gửi đánh giá']);
    }

    public function cancelBooking($id, $bill_id){
        // dd($bill_id);
        $bill = Bill::find($bill_id);
        $bill->status = 1;
        $bill->update();
        foreach($bill->order as $order){
            $order = Order::find($order->id);
            $order->status = 0;
            $order->update();
        }
        return redirect()->back()->with(['cancel-booking'=>'success','massage'=>'Hủy phòng thành công, kiểm tra trong lịch sử đặt phòng']);
    }
}
