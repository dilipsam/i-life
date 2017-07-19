<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartsController extends Controller {

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
        $grid = \DataGrid::source(new Chart);  //same source types of DataSet
        $grid->link('/charts/edit', "New Child", "TR");

        $grid->add('id', 'id', true);
        $grid->add('date_of_entry', 'Date of Entry');
        $grid->add('child_id', 'Family ID');
        $grid->add('height', 'Height');
        $grid->add('weight', 'Weight');
        $grid->add('head_circum', 'Circumference Of Head');


        $grid->edit('/charts/edit', 'Edit', 'show|modify|delete'); //shortcut to link DataEdit actio
        $grid->paginate(10); //pagination

        return view('charts/list', compact('grid'));
    }

    public function edit(Request $request) {
        $form = \DataEdit::source(new Chart);
        $form->link("charts", "Children", "TR")->back();

        $form->add('child_id', 'Child ID', 'number')->rule('required');

        $form->add('date_of_entry', 'DOE', 'date')->format('d/m/Y', 'en')->rule('required');
        $form->add('height', 'Height', 'number')->rule('required');
        $form->add('weight', 'Weight', 'number')->rule('required');
        $form->add('head_circum', 'Circumference Of Head', 'number')->rule('required');

        $form->add('remarks_one', 'Remarks', 'textarea')->attributes(array('rows' => 2));
        $form->add('remarks_two', 'Comments', 'textarea')->attributes(array('rows' => 2));

        return $form->view('charts/edit', compact('form'));
    }

}
