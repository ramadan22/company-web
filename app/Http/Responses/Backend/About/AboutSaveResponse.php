<?php

namespace App\Http\Responses\Backend\About;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Responsable;

class AboutSaveResponse implements Responsable
{
    public function toResponse($request)
    {
        $about = About::first();
        if (!$about) {
            About::create([
                'about_content' => $this->content($request->content)
            ]);
        }else{
            $about->update([
                'about_content' => $this->content($request->content)
            ]);
        }

        return redirect('/admin/aboutus')
            ->with('status', 'success')
            ->with('message', 'Success Updated About Us');
    }

    protected function content($description)
    {
        @$dom = new \DomDocument();
        @$dom->loadHtml($description);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $file = $img->getAttribute('src');
            $split = explode(';', $file);

            if(count($split) > 1){

                preg_match("/data\:image\/(.*)\;base64/",$file, $extension);
                $image = str_replace('data:image/'.$extension[1].';base64,', '', $file);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10).'.'.$extension[1];

                Storage::disk('public')->put('about/' . $imageName, base64_decode($image));
            }
        }

        $description = $dom->saveHTML();

        return $description;
    }
}
