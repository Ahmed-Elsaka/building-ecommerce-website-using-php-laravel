<?php
namespace App\Http\Controllers;

use App\ContactUs;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class ContactController extends Controller
{
    public function store(ContactRequest $request , ContactUs $contactUs){
        //return dd($request->toArray());
        $contactUs->create($request->all());
        return Redirect::back()->withFlashMessage('Message has Send successfully');
    }
    public function index(){


        return view('admin.contact.index');
        // Here is the problem
    }


    public function edit($id){

        $contact = ContactUs::find($id);
        $contact->fill(['view'=>1])->save();
        return view('admin.contact.edit',compact('contact'));
    }

    public function update($id, ContactUs $contactUs, Request $request){
        //dd($request->toArray());
        $contact = $contactUs->find($id);
        $contact->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('Message updated successfully');
    }
    public function destroy($id, ContactUs $contactUs){
        $contactUs->find($id)->delete();
        return  redirect('/adminpanel/contact')->withFlashMessage(" Message  has deleted successfully");
    }
    public function anyData(ContactUs $contactUs){

       // $this.test($contactUs->toArray());
        $contacts = $contactUs->all();
        return DataTables::of($contacts)
            ->editColumn('contact_name', function($model){
                $var =\Html::link('/adminpanel/contact/'. $model->id .'/edit',$model->contact_name,array('class'=>''));
                return $var;
                //return \Html::link('/users/'. $model->id .'/edit',$model->name, '/edit', $model->name);
            })
            ->editColumn('contact_type', function($model) {



                return  contact()[$model->contact_type];
                // return $model->admin == 0 ? '<span class="badge badge-info">' . 'member' . '</span>' : '<span class="badge badge-warning">' . 'Manager' . '</span>';
                // return $model->admin == 0 ? \Html::link('','member',array('class'=>'badge badge-info')):\Html::link('','Manager',array('class'=>'badge badge-info'));
            })
            ->editColumn('view', function($model) {
                return $model->view==0? "New Message" :'Old Message';
                // return $model->admin == 0 ? '<span class="badge badge-info">' . 'member' . '</span>' : '<span class="badge badge-warning">' . 'Manager' . '</span>';
                // return $model->admin == 0 ? \Html::link('','member',array('class'=>'badge badge-info')):\Html::link('','Manager',array('class'=>'badge badge-info'));
            })
            ->editColumn('control', function($model){
                    $var =\Html::link('/adminpanel/contact/'. $model->id .'/edit','Edit/Delete',array('class'=>'btn btn-info btn-circle'));
                return  $var;
            })
            ->make(true);


    }
}
