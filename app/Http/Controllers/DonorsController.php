<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorsController extends Controller {

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
        $grid = \DataGrid::source(new Donor);  //same source types of DataSet
        $grid->link('/donors/edit', "New Donor", "TR");

        $grid->add('id', 'id', true);
        $grid->add('email', 'email');
        $grid->add('opening_date', 'opening_date');

        $grid->edit('/donors/edit', 'Edit', 'show|modify|delete'); //shortcut to link DataEdit actio
        $grid->paginate(10); //pagination

        return view('donors', compact('grid'));
    }

    public function edit(Request $request) {
        $form = \DataEdit::source(new Donor);
        $form->link("donors", "Donors", "TR")->back();
       
        $form->add('email', 'Email', 'text')->rule('required|email');
        $form->add('pan', 'PAN', 'text')->rule('required');
        
        $form->add('opening_date', 'Opening Date', 'date')->format('d/m/Y', 'en')->rule('required');

        return $form->view('donors/edit', compact('form'));
    }
}
