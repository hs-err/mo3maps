<?php


namespace App\Http\Controllers;


use App\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        return view('welcome')
            ->with('maps',Map::paginate(15));
    }
    public function home(){
        return view('home')
            ->with('maps',Map::where('author','=',Auth::id())->paginate(15));
    }
    public function detail($id){
        return view('detail')
            ->with('map',Map::findOrFail($id));
    }
    public function edit($id){
        $map=Map::find($id);
        if(!$map){
            $map=new Map;
        }elseif($map->author!=Auth::id()){
            abort(400);
        }
        return view('edit')
            ->with('map',$map);
    }
    public function edit_save($id,Request $request){
        $map=Map::find($id);
        if(!$map){
            $map=new Map;
            $map->category_id=0;
            $map->tags='[]';
        }elseif($map->author!=Auth::id()){
            abort(400);
        }
        $request->validate([
            'name' => 'required|max:255',
            'version' => 'required|max:255',
            'markdown' => 'required',
            'title' => 'required',
            'describe' => 'required',
            'cover'=>'nullable|file|dimensions:min_width=100,min_height=200',
            'file'=>'nullable|file'
        ]);
        $map->name=$request->input('name');
        $map->author=Auth::id();
        $map->version=$request->input('version');
        $map->markdown=$request->input('markdown');
        $map->title=$request->input('title');
        $map->describe=$request->input('describe');
        if($request->file('file')){
            $md5=md5($request->file('file'));
            Storage::disk('local')->putFileAs('/', $request->file('file'),$md5);
            $map->md5=$md5;
        }
        if($request->file('cover')){
            $md5=md5($request->file('cover'));
            Storage::putFileAs('/', $request->file('cover'),$md5);
            $map->cover=$md5;
        }
        $map->save();
        return redirect(route('detail',['id'=>$map->id]));
    }
    public function download($id){
        $map=Map::findOrFail($id);
        return Storage::disk('local')->download($map->storage('map_file'),$map->iname().'.zip');
    }
}
