<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Recipient;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipientsController extends Controller {

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
        $grid = \DataGrid::source(new Recipient);  //same source types of DataSet

        $grid->link('/recipients/edit/', "New Recipient", "TR");

        $grid->add('id', 'id', true);
        $grid->add('name_husband', 'Name of Husband');
        $grid->add('name_wife', 'Name of Wife');
        $grid->add('address_village_name', 'Village');
        $grid->add('address_town', 'Town/District');
        $grid->add('date_of_delivery', 'Delivery Date');

        $grid->edit('/recipients/edit', 'Edit', 'modify|delete'); //shortcut to link DataEdit actio

        $grid->paginate(10); //pagination

        return view('recipients/list', compact('grid'));
    }

    public function edit() {

        $form = \DataEdit::source(new Recipient);

        $form->link("recipients", "Recipients", "TR")->back();

        $form->add('name_husband', 'Name of Husband', 'text')->rule('required');
        $form->add('name_wife', 'Name of Wife', 'text')->rule('required');
        $form->add('date_of_delivery', 'Delivery Date', 'date')->format('d/m/Y', 'en')->rule('required');

        $form->add('address_first_line', 'Address Line 1', 'text')->rule('required');
        $form->add('address_second_line', 'Address Line 2', 'text')->rule('required');
        $form->add('address_village_name', 'Village', 'text')->rule('required');
        $form->add('address_town', 'Town/ District', 'text')->rule('required');
        
        
        $form->add('facilities','Facilities','checkboxgroup')->options(Facility::lists('name', 'id')->all());

        $form->saved(function () use ($form) {
            $form->message("Recipient Added");
            $form->link("/recipients/edit/", "Add Another");
        });

        return $form->view('recipients/edit', compact('form'));
    }

}
