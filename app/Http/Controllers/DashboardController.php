<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    private $root = 'public/';
    public function index(Request $request)
    {
        $dirToFind = $request->dir;
        if (!$request->dir) {
            $dirToFind = $this->root . $request->dir;
        }

        $sections = explode("/", $dirToFind);
        array_splice($sections, 0, 1);
        // dd($sections);

        $urls = [];
        $currenValue = "";
        foreach ($sections as $section) {

            array_push($urls, $currenValue . $section . "/");
            $currenValue = $currenValue . $section . "/";
        }


        $dirs = Storage::directories($dirToFind);
        $files = Storage::files($dirToFind);
        return view('dashboard', ['datas' => [
            'sections' => $sections,
            'urls' => $urls
        ],  'dirs' => $dirs, 'files' => $files]);
    }

    public function newFolder(Request $request)
    {
        return view('newfolder', ['dir' => $request->dir]);
    }

    public function createFolder(Request $request)
    {
        Storage::makeDirectory($request->dir . '/' . $request->name);
        return redirect(route('dashboard', ['dir' => $request->dir]));
    }

    public function uploadFile(Request $request)
    {
        return view('upload', ['dir' => $request->dir]);
    }

    public function upload(Request $request)
    {
        $request->file('file')->storeAs($request->dir, $request->file('file')->getClientOriginalName());
        return redirect(route('dashboard', ['dir' => $request->dir]));
    }
}
