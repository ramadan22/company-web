<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactusController extends Controller
{
    public function index()
    {
        $data = DB::table('contactus')->where('is_delete', '0')->get();

        // echo "<pre>";
        //     print_r($data);die();

        return view('admin.pages.contactus', compact('data'));
    }

    public function delete($id){
        DB::table('contactus')->where('id_contactus', $id)->update([
            'is_delete'     => "1"
        ]);

        return redirect('/admin/contactus')->with('status', 'success')->with('message', 'Data has been deleted!');
    }
}
