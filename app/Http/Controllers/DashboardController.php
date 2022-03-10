<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    private $root = 'public/';
    private $newFileName = '';
    private $count = 1;
    

    public function index(Request $request)
    {
        $dirToFind = $this->dirToFind($request);
        $dir = $this->sections($dirToFind);
        $modulesDirectory=Str::contains($dirToFind,'/modules')?"$dirToFind":"$dirToFind/modules";
        $submissionsDirectory=Str::contains($dirToFind,'/submissions')?"$dirToFind":"$dirToFind/submissions";
        $modules = Storage::directories($modulesDirectory);
        $submissions = Storage::directories($submissionsDirectory);
        
        $files = Storage::files($dirToFind);
        return view('dashboard', [
            'datas' => [
                'sections' => $dir['sections'],
                'urls' => $dir['urls']
             ], 
            'modules' => $modules, 
            'submissions' => $submissions,
            'files'=>$files
        ]);
    }

    public function newFolder(Request $request)
    {
        $dirToFind = $this->dirToFind($request);
        $dir = $this->sections($dirToFind);

        return view('newfolder', ['dir' => $request->dir, 'datas'=>['sections' => $dir['sections'], 'urls' => $dir['urls']]]);
    }

    public function createFolder(Request $request)
    {   
    
        Storage::makeDirectory($request->dir. '/' . $request->name);
        return redirect(route('dashboard', ['dir' => $request->dir]));
    }

    public function uploadFile(Request $request)
    {
        $dirToFind = $this->dirToFind($request);
        $dir = $this->sections($dirToFind);

        return view('upload', ['dir' => $request->dir, 'datas'=>['sections' => $dir['sections'], 'urls' => $dir['urls']]]);
    }

    public function checkFileExisted($dir, $file)
    {
        if(Storage::exists($dir.'/'.$file)){
            $newFileName = explode('.', $file);
            $cleanFile = "";

            if(str_contains($newFileName[0], 'copy')){
                $trimmedFileName = explode('copy', $newFileName[0]);
                if($trimmedFileName[1] != ""){

                    do{
                        $cleanFile = $newFileName[0].' copy ('.$this->count.').'.$newFileName[1];
                        $this->count++;
                        $this->checkFileExisted($dir, $cleanFile);
                    }
                    while(str_contains($file, 'copy ('.$this->count.')'));

                    $this->newFileName = $trimmedFileName[0].'copy ('.$this->count.').'.$newFileName[1];
                    $this->checkFileExisted($dir, $this->newFileName);
                }
                else{
                    $this->newFileName = $trimmedFileName[0].'copy (1).'.$newFileName[1];
                    $this->checkFileExisted($dir, $this->newFileName);
                }
            }
            else{
                $this->newFileName = $newFileName[0].' copy.'.$newFileName[1];
                $this->checkFileExisted($dir, $this->newFileName);
            }
        }
        else{
            $this->newFileName = $file;
            return false;
        }
    }

    public function upload(Request $request)
    {
        if(!$this->checkFileExisted($request->dir, $request->file('file')->getClientOriginalName())){
            $request->file('file')->storeAs($request->dir, $this->newFileName);
            return redirect(route('dashboard', ['dir' => $request->dir]));
        }
    }

    public function sections($dirToFind)
    {
        $sections = explode("/", $dirToFind);
        array_splice($sections, 0, 1);

        $urls = [];
        $currenValue = "";
        foreach ($sections as $section) {

            array_push($urls, $currenValue . $section . "/");
            $currenValue = $currenValue . $section . "/";
        }

        return ['sections' => $sections, 'urls' => $urls];
    }

    public function dirToFind($request)
    {
        $dirToFind = $request->dir;
        if (!$request->dir) {
            $dirToFind = $this->root . $request->dir;
        }

        return $dirToFind;
    }

    private function removeLastFolder($dir)
    {
        $temp=explode("/",$dir);
        array_pop($temp);
        return $newDir=implode("/",$temp);

    }
    public function delete(Request $request)
    {
        $dir="";

        if($request->file){
            $dir=$request->file;
            Storage::delete($request->file);
        }else{
            $dir=$request->dir;
            Storage::deleteDirectory($request->dir);
        }
    
    
        $newDir=$this->removeLastFolder($dir);

        return redirect(route('dashboard', ['dir' => $newDir]));
    }

    public function update(Request $request)
    {
        $newDir=$this->removeLastFolder($request->dir);

        rename(storage_path("/app/") . $request->dir, storage_path("/app/") . $newDir . "/" . $request->newFolderName);

        return redirect(route('dashboard', ['dir' => $newDir]));
    }
}
