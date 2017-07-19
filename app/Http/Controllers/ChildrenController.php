<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildrenController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $grid = \DataGrid::source(new Child);  //same source types of DataSet
        $grid->link('/children/edit', "New Child", "TR");

        $grid->add('id', 'id', true);
        $grid->add('name', 'name', true);
        $grid->add('recipient_id', 'Family ID');
        $grid->add('date_of_birth', 'Date of Birth');

        $grid->edit('/children/edit', 'Edit', 'show|modify|delete'); //shortcut to link DataEdit actio
        $grid->paginate(10); //pagination

        return view('children/list', compact('grid'));
    }

    public function edit(Request $request) {
        $form = \DataEdit::source(new Child);
        $form->link("children", "Children", "TR")->back();
        $form->add('name', 'Name', 'text');
        //$form->add('recipient_id','Family ID','autocomplete')->options(\App\Models\Recipient::lists('id', 'id')->all());
        $form->add('recipient_id', 'Family ID', 'number')->rule('required');
        $form->add('date_of_birth', 'DOB', 'date')->format('d/m/Y', 'en')->rule('required');

        return $form->view('children/edit', compact('form'));
    }

}
