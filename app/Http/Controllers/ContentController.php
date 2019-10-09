<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;
use Validator;
use Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $content = DB::table('contents')->get();

        $content = Contents::all();
        //phân trang
        $contents = Contents::latest()->paginate(5);
        return view('contents.index', compact('contents'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2',
            'content' => 'required',
            'image_path' => 'image:image_path|mimes:jpeg,png,jpg,gif|max:50000',
        ];
        $message = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải chứa ít nhất 2 ký tự',
            'content.required' => 'Content không được để trống',
            'image_path.required' => 'ảnh không được để trống',
            'image_path.image' => 'upload ảnh phải đứng định dạng',
            'image_path.mimes' => 'chỉ chấp nhận ảnh với đuôi .jpeg .png .jpg .gif',
            'image_path.max' => 'ảnh upload dung lượng không ',
        ];
        $this->validate($request, $rules, $message);
            //tiến hành lưu ảnh nếu có
            $image_name = '';
            //nếu có ảnh upload lên, thì tiến hành lưu ảnh
            if ($request->hasFile('image_path')) {
                $image_path = $request->file('image_path');
                //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
                $image_name = time() . '_' . $image_path->getClientOriginalName();
                //lưu ảnh lên thư mục public/uploads
                $image_path->move(public_path('uploads'), $image_name);
//                dd($image_path);
            }
            $content = new Contents();
            $content->name = $request->input('name');
            $content->content = $request->input('content');
            $content->image_path = $image_name;
            $content->id_user = Auth::user()->id;
            $content->save();
            return redirect()->back()->with('message', 'Bạn đã thêm thành công');

        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Contents::find($id);
        return view('contents.detail',compact('content'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Contents::find($id);
        return view('contents.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:2',
            'content' => 'required',
            'image_path' => 'required|image:image_path|mimes:jpeg,png,git,jpg|max:2024',
        ];
        $message = [
            'name.required' => 'Name không dduwwocj để trống',
            'name.min' => 'Name phải chứa ít nhất 2 ký tự',
            'content.required' => 'Content không được để trống',
            'image_pathd.required' => 'ảnh không được để trống',
            'image_path.image' => 'upload ảnh phải đứng định dạng',
            'image_path.mimes' => 'chỉ chấp nhận ảnh với đuôi .jpeg .png .jpg .gif',
            'image_path.max' => 'ảnh upload dung lượng không >2M',
        ];
        $this->validate($request, $rules, $message);
        $user = auth::user();
        $content = Contents::find($id);
        if ($user->can('update', $content)) {
            //tiến hành lưu ảnh nếu có;
            $image_name  = $content->image_path;
            // dd($image_name);
            //kiểm tra ảnh có tồn tại hay khôngz
            if ($request->hasFile('image_path')) {
                //xóa file ảnh nếu đã tồn tại
                @unlink(public_path('uploads' .  $image_name ));
                $image_path = $request->file('image_path');
                //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
                $image_name = time() . '_' . $image_path->getClientOriginalName();
                //lưu ảnh lên thư mục public/uploads
                $image_path->move(public_path('uploads'),  $image_name );
//            dd($image_path);
            }
            $content->name = $request->input('name');
            $content->content = $request->input('content');
            $content->id_user = Auth::user()->id;
            $content->image_path = $image_name ;
            $content->save();
            return redirect()->route('contents.index')->with('message','Bạn đã sửa thành công');

        }
        else{
            return redirect()->route('contents.index')->with('message','Bạn không có quyền sửa bài viết này');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //người dùng hiện tại
        $user = auth::user();
        $contents = Contents::find($id);
        if ($user->can('delete', $contents)) {
            $contents->delete();
            return redirect()->route('contents.index')->with('message', 'Xóa bài viết thành công');
        }
        else{
            return redirect()->route('contents.index')->with('message', 'Bạn không có quyền xóa bài viết này');
        }
    }
}
