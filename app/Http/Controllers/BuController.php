<?php

namespace App\Http\Controllers;

use App\BU;
use App\BUPhotos;
use App\Http\Requests\BuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;

class BuController extends Controller
{
    public function index(Request $request){
        $id = $request->id != null ?'?user_id='.$request->id : null;

        return view('admin.bu.index',compact('id'));
    }
    public function create(){
        return view('admin.bu.add');
    }
    public function edit($id){
        $bu =BU::find($id);
        return view('admin.bu.edit', compact('bu'));
    }
    public function update($id, BuRequest $buRequest){
       $buUpdate = Bu::find($id);
        $buUpdate->fill(array_except($buRequest->all(),['image']))->save();
        if($buRequest->file('image')){
            $fileName = uploadImage($buRequest->file('image'),'/public/website/bu_images/', 500, 362,$buUpdate->image);
            if($fileName == false){
                return Redirect::back()->withFlashMessage('please select image with size w < 500, l < 362');
            }
             $buUpdate->fill(['image'=>$fileName])->save();

        }
        return  Redirect('/adminpanel/bu')->withFlashMessage('the Properity Has been Updated Successfully');
    }
    public function store(BuRequest $buRequest, BU $bu){
      //  dd('iam in store function in Bu controller');
        if($buRequest->file('image')) {
            $fileName = uploadImage($buRequest->file('image'));
            if(!$fileName){
                Redirect::back()->withFlashMessage('please select image with size w < 500, l < 362');
            }
            $image = $fileName;
        }else{
            $image = '';
        }

        $user = Auth::user();
        $data = [
            'bu_name' =>$buRequest->bu_name,
            'bu_price'=>$buRequest->bu_price,
            'bu_rent'=>$buRequest->bu_rent,
            'bu_square'=>$buRequest->bu_square,
            'bu_type'=>$buRequest->bu_type,
            'bu_small_dis'=>$buRequest->bu_small_dis,
            'bu_meta'=>$buRequest->bu_meta,
            'bu_langtuite'=>$buRequest->bu_langtuite,
            'bu_latitude'=>$buRequest->bu_latitude,
            'bu_larg_dis'=>$buRequest->bu_larg_dis,
            'bu_status'=>$buRequest->bu_status,
            'user_id'=>$user->id,
            'rooms'=>$buRequest->rooms,
            'bu_place'=>$buRequest->bu_place,
            'image'=>$image,
            'month'=>date('m')
        ];
        //dd($data);
        $bu->create($data);
        $bu_id = $bu->where('bu_name',$buRequest->bu_name)->where('bu_price',$buRequest->bu_price)->where('bu_type',$buRequest->bu_type)
            ->where('bu_small_dis',$buRequest->bu_small_dis)->where('bu_place',$buRequest->bu_place)
            ->value('id');
        //dd($bu_id);
        if($buRequest->file('photos')){
            foreach($buRequest->file('photos') as $img)
            {
                $photoName = uploadImage($img,'/public/website/Buildings_images',786,400);
                BUPhotos::create([
                    'bu_id'=>$bu_id,
                    'photo_name'=>$photoName,
                ]);

            }
        }
        return Redirect('/adminpanel/bu')->withFlashMessage('the Properity Has beed Added Successfully');
    }
    public function destroy($id, BU $bu){
        $bu->find($id)->delete();
        return  redirect('/adminpanel/bu')->withFlashMessage('the Building '.$bu->bu_name.' has deleted successfully');
    }
    public function anyData(Request $request,BU $bu){
        if($request->user_id){
            $bus = $bu->where('user_id',$request->user_id)->get();
        }else{
            $bus = $bu->all();
        }

        return DataTables::of($bus)
            ->editColumn('bu_name', function($model){
                $var =\Html::link('/adminpanel/bu/'. $model->id .'/edit',$model->bu_name,array('class'=>''));
                return $var;
                //return \Html::link('/users/'. $model->id .'/edit',$model->name, '/edit', $model->name);
            })
            ->editColumn('bu_type', function($model) {
                $type = bu_type();
                return $type[$model->bu_type];
                // return $model->admin == 0 ? '<span class="badge badge-info">' . 'member' . '</span>' : '<span class="badge badge-warning">' . 'Manager' . '</span>';
                // return $model->admin == 0 ? \Html::link('','member',array('class'=>'badge badge-info')):\Html::link('','Manager',array('class'=>'badge badge-info'));
            })
            ->editColumn('bu_status', function($model) {
                return $model->bu_status==0? "NotActive":'Active';
                // return $model->admin == 0 ? '<span class="badge badge-info">' . 'member' . '</span>' : '<span class="badge badge-warning">' . 'Manager' . '</span>';
                // return $model->admin == 0 ? \Html::link('','member',array('class'=>'badge badge-info')):\Html::link('','Manager',array('class'=>'badge badge-info'));

            })
            ->editColumn('control', function($model){
                    $var =\Html::link('/adminpanel/bu/'. $model->id .'/edit','Edit/Delete',array('class'=>'btn btn-info btn-circle'));
                return  $var;
            })
            ->make(true);


    }
    public function showAllEnable(BU $bu){
        $buAll = $bu->where('bu_status',1)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }
    public function ForRent(BU $bu){
        $buAll = $bu->where('bu_status',1)->where('bu_rent',1)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }
    public function ForBuy(BU $bu){

        $buAll = $bu->where('bu_status',1)->where('bu_rent',0)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }
    public function ShowByType($type,BU $bu){
        if(in_array($type,["0","1","2"])){
            $buAll = $bu->where('bu_status',1)->where('bu_type',$type)->orderBy('id','desc')->paginate(15);
            return view('website.bu.all',compact('buAll'));
        }
        else{
            return Redirect::back();
        }
    }
    public function search(Request $request, Bu $bu){
       //there are to methods to handle this case
            // 1- build query
             /*   $requestAll = array_except($request->toArray(),['_token','submit']);
                $out = '';
                $i = 0 ;
                foreach ($requestAll as $key => $req){
                    if($req != null){
                        $where = $i ==0? "where": " and";
                        $out .= $where.' '.$key.' = '.$req;
                        $i = 2;
                    }
                }
                $query = 'select * from bu '.$out;
                $buAll = DB::select($query);
            */

             // 2-Method 2
        $max = $request->bu_price_to ==''? 10000000: $request->bu_price_to;
        $min = $request->bu_price_from ==''? 50000: $request->bu_price_from;

        $requestAll = array_except($request->toArray(),['_token','submit','page']);
        $query = DB::table('bu')->select('*');
        $array = [];
        $count = count($requestAll);
        $i = 0 ;
        foreach ($requestAll as $key =>$req){
            $i++;
            if($req != ''){
                if($key == 'bu_price_from' && $request->bu_price_to ==''){
                    $query->where('bu_price','>=',$req);
                }elseif($key == 'bu_price_to' && $request->bu_price_from ==''){
                    $query->where('bu_price','<=',$req);
                }else {
                    if($key !='bu_price_from' && $key!='bu_price_to'){
                        $query->where($key, $req);
                    }
                }
                $array[$key]=$req;
            }elseif($count == $i && $request->bu_price_to !=''  && $request->bu_price_from !=''){
                $query->whereBetween('bu_price',[$request->bu_price_from ,$request->bu_price_to ]);
                $array[$key]=$req;
            }
        }
        $buAll =  $query->orderBy('id','desc')->paginate(15);
       // $search = '';
        return view('website.bu.all',compact('buAll','array'));
    }
    public function SingleBuilding($id,Bu $bu){
            $buInfo = $bu->findOrFail($id);
            $same_rent = $bu->where('bu_rent',$buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
            $same_type = $bu->where('bu_type',$buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
            $building_images = BUPhotos::where('bu_id',$id)->get();
            $building_images_count = BUPhotos::where('bu_id',$id)->count();
            return view('website.bu.buInfo',compact('buInfo','same_rent','same_type','building_images','building_images_count'));
    }
    public function getAjaxInfo(Request $request, Bu $bu){
        return $bu->find($request->id)->toJson();

    }
    // add new property to user
    public function userAddView()
    {
        return view('website.userBu.userAdd');
    }
    public function userStore(BuRequest $buRequest, BU $bu){
       // dd('iam in user strore function');
          //  dd($buRequest->toArray());
        if($buRequest->file('image')) {
            $fileName = uploadImage($buRequest->file('image'));
            if(!$fileName){
                Redirect::back()->withFlashMessage('please select image with size w < 500, l < 362');
            }
            $image = $fileName;
        }else{
            $image = '';
        }

        $user = Auth::user()?Auth::user()->id :0;
        $data = [
            'bu_name' =>$buRequest->bu_name,
            'bu_price'=>$buRequest->bu_price,
            'bu_rent'=>$buRequest->bu_rent,
            'bu_square'=>$buRequest->bu_square,
            'bu_type'=>$buRequest->bu_type,
            'bu_small_dis'=>strip_tags(str_limit($buRequest->bu_larg_dis,150)),
            'bu_meta'=>$buRequest->bu_meta,
            'bu_langtuite'=>$buRequest->bu_langtuite,
            'bu_latitude'=>$buRequest->bu_latitude,
            'bu_larg_dis'=>$buRequest->bu_larg_dis,
            'bu_status'=>0,
            'user_id'=>$user,
            'rooms'=>$buRequest->rooms,
            'bu_place'=>$buRequest->bu_place,
            'image'=>$image,
            'month'=>date('m')
        ];
        //dd($data);
        $bu->create($data);

        //upload images related to building
        $bu_id = $bu->where('bu_name',$buRequest->bu_name)->where('bu_price',$buRequest->bu_price)->where('bu_type',$buRequest->bu_type)
            ->where('bu_small_dis',strip_tags(str_limit($buRequest->bu_larg_dis,150)))->where('bu_place',$buRequest->bu_place)
            ->value('id');

        if($buRequest->file('photos')){
            foreach($buRequest->file('photos') as $img)
            {
                $photoName = uploadImage($img,'/public/website/bu_images/',786,400);

                BUPhotos::create([
                    'bu_id'=>$bu_id,
                    'photo_name'=>$photoName,
                ]);
            }
        }
        return view('website.userBu.done');
        //return Redirect('/adminpanel/bu')->withFlashMessage('the Properity Has beed Added Successfully');
    }
    // function return buildings to specific user 
    public function showUserBuildings(BU $bu)
    {
        $user = Auth::user();
        $bu = $bu->where('user_id',$user->id)->where('bu_status',1)->orderBy('id','desc')->paginate(9);
        return view('website.userBu.showUserBu',compact('bu','user'));


    }

    public function showUserWaitingBuildings(BU $bu)
    {
        $user = Auth::user();
        $bu = $bu->where('user_id',$user->id)->where('bu_status',0)->orderBy('id','desc')->paginate(9);
        return view('website.userBu.showUserBu',compact('bu','user'));

    }
    public function userEditProperty($id, BU $bu)
    {

        $user = Auth::user();
        $user_id = null;

        try {
            // this try used to handel edit un added properties through link
            $bu_info = $bu->find($id);
            $user_id = $bu_info->user_id;
        }catch (\Exception $e){
            $user_id = -1;
        }
        if($user->id != $user_id){
            return  Redirect('/user/buldingShow')->withFlashMessage('This Building is not active');
        }
        elseif ($bu_info->bu_status ==1)
        {
            return  Redirect('/user/buldingShow')->withFlashMessage('this building is active , and you cannot edit it ');
        }
        else{
            $bu = $bu_info;
            return view('website.userBu.edituserbu',compact('bu','user'));
        }
    }
    // user can update the building befor it is activated 
    public function userUpdateProperty(BuRequest $request, Bu $bu)
    {
        $buUpdate = $bu->find($request->bu_id);
        $buUpdate->fill(array_except($request->all(),['image']))->save();

        if($request->file('image')){
            $fileName = uploadImage($request->file('image'),'/public/website/bu_images/', 500, 362,$buUpdate->image);
            if($fileName == false){
                return Redirect::back()->withFlashMessage('please select image with size w < 500, l < 362');
            }
            $buUpdate->fill(['image'=>$fileName])->save();
        }
        return Redirect::back()->withFlashMessage('Property Info Updated Successfully ');

        
    }


    // test multiUpload images
    public function uploadForm()

    {

        return view('Upload_form');

    }

    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'photos'=>'required',
        ]);
       // dd($request->toArray());
        //get bu_id based on input data
        $data="";
        if($request->hasFile('photos')){
            foreach($request->file('photos') as $image)
            {
                $name=$image->getClientOriginalName();
                //$image->move(public_path().'/images/', $name);
                $image_name = $data;
                /*
                BUPhotos::create([
                    'bu_id'=>2,
                    'photo_name'=>$name,
                ]);
                */
                $data .= $name." | ";
            }
        }
       // dd($data);

        if($request->hasFile('photos')) {
            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'docx'];
            $files = $request->file('photos');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {

                    //$items = Item::create($request->all());
                    foreach ($request->photos as $photo) {
                        //  $filename = $photo->store('photos');
                        // ItemDetail::create([
                        //   'item_id' => $items->id,
                        // 'filename' => $filename
                        //]);
                    }
                    echo "Upload Successfully";
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }

            }
        }
        return view('website.bu.itemSlider');
    }

}
