<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqtampilanController extends Controller
{
    public function index()
    {
        $dataFaq = Faq::all();
        return view('tampilan.home', compact('dataFaq'));

    }
}
