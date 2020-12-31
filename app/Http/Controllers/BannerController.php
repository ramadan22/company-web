<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class BannerController extends Controller
{
    public function index()
    {
        $data = DB::table('banner')->where('is_delete', '0')->get();

        return view('admin.pages.banner', compact('data'));
    }

    public function add(Request $request){
        $title = $request->title;
        $img_banner = $request->file('img_banner');
        $description = $request->description;

        $fileName = time().'.png';
        $path = base_path() . "/assets/banner/";

        $img_banner->move($path, $fileName);

        DB::table('banner')->insert([
            'title' => $title,
            'img_banner' => 'assets/banner/' . $fileName,
            'description' => $description,
            'created_date' => date('Y-m-d H:i:s'),
            'is_delete' => '0'
        ]);

        return redirect('/admin/banner')->with('status', 'success')->with('message', 'Banner data has been added');
    }

    public function getEdit(Request $request){
        $data = DB::table('banner')->where('id_banner', $request->id)->get()->first();

        return json_encode($data);
    }

    public function edit(Request $request){
        $id = $request->id;
        $title = $request->title;
        $img_banner = $request->file('img_banner');
        $description = $request->description;

        if($request->file('img_banner')){
            $img_banner = $request->file('img_banner');
            $fileName = time().'.png';
            $path = base_path() . "/assets/banner/";

            $img_banner->move($path, $fileName);
            @unlink($path . str_replace("assets/banner/", "", $request->old_image));
            $image = 'assets/banner/' . $fileName;
        } else {
            $image = $request->old_image;
        }

        DB::table('banner')->where('id_banner', $id)->update([
            'title' => $title,
            'img_banner' => 'assets/banner/' . $fileName,
            'description' => $description
        ]);

        return redirect('/admin/banner')->with('status', 'success')->with('message', 'Banner data has been Edited');
    }

    public function delete($id){
        DB::table('banner')->where('id_banner', $id)->update([
            'is_delete'     => "1"
        ]);

        return redirect('/admin/banner')->with('status', 'success')->with('message', 'Data has been deleted!');
    }
}
