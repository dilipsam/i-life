<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\DonorLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorFamilyController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $grid = \DataGrid::source(new DonorLink);  //same source types of DataSet
        $grid->link('donor-family/edit', "New Link", "TR");

        $grid->add('id', 'id', true);
        $grid->add('donor_id', 'donor_id');
        $grid->add('recipient_id', 'recipient_id');
        $grid->add('is_active', 'is_active');

        $grid->edit('/donors-family/edit', 'Edit', 'show|modify|delete'); //shortcut to link DataEdit actio
        $grid->paginate(10); //pagination

        return view('donorsrecipients/list', compact('grid'));
    }

    public function edit(Request $request) {
        $form = \DataEdit::source(new DonorLink);
        $form->link("Donors Recipients Map", "Donors Recipients Map", "TR")->back();

        $form->add('donor_id', 'Donor', 'autocomplete')->search(['email','pan'])->rule('required');
       
        $form->add('family_id', 'Family', 'number')->rule('required');

        return $form->view('donorsrecipients/edit', compact('form'));
    }

}
