<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = new Home();
        // order
        $verifiedOrder = $home->numberOfVerifiedOrder();
        $unverifiedOrder = $home->numberOfUnverifiedOrder();
        $orderedUser = $home->numberOfOrderedUser();
        // income
        $totalIncome = $home->sumIncome();
        // product
        $numberOfProduct = $home->numberOfProduct();
        $amountOfOrderedProduct = $home->amountOfOrderedProduct();
        // user
        $numberOfRegister  = $home->numberOfRegister();

        return view(
            'admin.home',
            compact(
                // order
                'verifiedOrder',
                'unverifiedOrder',
                'orderedUser',
                // income
                'totalIncome',
                // product
                'numberOfProduct',
                'amountOfOrderedProduct',
                // user
                'numberOfRegister'

            )
        );
    }
}
