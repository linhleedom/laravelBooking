<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $user = User::find($id);
            $province = Province::all();
            $district = District::all();
            $ward = Ward::all();

            $homestay = Homestay::where('user_id',Auth::user()->id)->get();
            $homestayforPartner = array();
            foreach ($homestay as $homestayVal){
                array_push($homestayforPartner, $homestayVal->id);
            };

            $rate = Rating::whereIn('homestay_id',$homestayforPartner)->paginate(3);
            // dd($rate);
            return view('partner.account.account',compact('user','id','province','district','ward','bill','rate'));
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
                'email.required'=>'Bạn chưa nhập email',
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
                'pass_new'=>'required|min:6|max:20',
                'confirm_pass_new'=>'required|same:pass_new'
            ],
            [
                'pass_old.required'=>'Vui lòng nhập mật khẩu',
                'pass_old.current_password'=>'Mật khẩu cũ không chính xác',
                'pass_new.required'=>'Vui lòng nhập mật khẩu',
                'pass_new.min'=>'Mật khẩu phải dài hơn 6 kí tự',
                'pass_new.max'=>'Mật khẩu dài không quá 20 kí tự',
                'confirm_pass_new.required'=>'Vui lòng nhập mật khẩu xác nhận',
                'confirm_pass_new.same'=>'Mật khẩu xác nhận không đúng'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'password');
        }
        $user = User::find($id);
        $user->password = bcrypt($request->pass_new);
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
    public function getChange($bill_id){
        $rate = Rating::find($bill_id);
        if($rate->status == 0){            
            $rate->status = 1;        
            $rate->update();
        }elseif($rate->status == 1) {            
            $rate->status = 0;        
            $rate->update();
        }
        // return view('partner.account.account');
        return redirect()->back()->with(['change-status'=>'success','massage'=>'Đổi trạng thái phòng thành công']);
    }
}
