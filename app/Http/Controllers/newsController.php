<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use App\pic;
use File;
use Storage;
class newsController extends Controller
{

    public function __construct() {
        $this->middleware('check_owner');
    }
    
    public function index()
    {
        $id=auth()->user()->halls_id;
        $news=news::where('halls_id','=',$id)->orderby('created_at','DESC')->paginate(10);
        return view('news.index')->with([
            'news' => $news,
        ]);
    }
   
    public function store(Request $request)
    {
        $id=auth()->user()->halls_id;
        $news = new news;
        $news->subject=request("subject");
        $news->content=request("content");
        $news->halls_id=$id;
        $news->save();
        $id=news::max('id');
        $news = news::find($id);
        return view('news.show')->with([
            'news' => $news,
        ]);

    }

    public function show($id)
    {
        $news = news::find($id);
        
        return view('news.show')->with([
            'news' => $news,
        ]);
    }

    public function destroy($id)
    {
        $news = news::find($id);
        $news->delete();
        return redirect()->back();
    }

    /**-------------------------------------------------------------------------------- */
    public function pic()
    {
        $id=auth()->user()->halls_id;
        $pic = pic::where('halls_id','=',$id)->orderby('created_at','DESC')->get();
        return view('news.pic')->with([
            'pic' => $pic,
        ]);
    }
    public function insertpic(Request $request)
    {   
                
        $id=auth()->user()->halls_id;
        $pic_count = pic::where('halls_id','=',$id)->get();
        if($pic_count->count() >= 4 )//خمسه صور فقط نبو
        {
            return redirect()->back()->with('error','لايمكن إضافة المزيد من صور ');
        }
        else
        {
             request()->validate([
                'file'     => 'required|image|mimes:png,jpg,jpeg,svg'
             ]);
             $pic = new pic;
             $pic->halls_id=$id;
             if (request()->hasFile('file')) {
                 $img = request()->file('file');
                 $img_name = time() . '.' . $img->extension();
                 $img->move('upload' , $img_name);
                 $pic->file = 'upload/' .$img_name;
             };
          
             $pic->save();
     
     
             $pic = pic::where('halls_id','=',$id)->orderby('created_at','DESC')->get();
             return view('news.pic')->with([
                 'pic' => $pic,
             ]);
        }
    }

    public function delpic($id)
    {
        $pic =pic::find($id);
        $pic->delete();
        return redirect()->back()->with('success','تم الحدف بنجاح ');

    }

}
