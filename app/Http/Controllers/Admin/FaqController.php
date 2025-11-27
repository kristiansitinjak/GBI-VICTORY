<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    { 
        $allFaq = Faq::all();

        return view('faq.faq', compact('allFaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.tambahfaq');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        $newFaq = new Faq;
        $newFaq->pertanyaan = $request->pertanyaan;
        $newFaq->jawaban = $request->jawaban;

        $newFaq->save();
        return redirect("/admin/faq")->with('status', 'Warta Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($faqId)
    {
        $faq = Faq::where('id', $faqId)->first();
        return view('faq.editfaq', ['faq'=>$faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faqId)
    {
        $request->validate([
            'pertanyaan'=>'required',
            'jawaban'=> 'required',
        ]);

        Faq::where('id', $faqId)
            ->update([
                'pertanyaan'=>$request->pertanyaan,
                'jawaban'=> $request->jawaban,
            ]);
        return redirect('/admin/faq')->with('status','faq dengan id'.$faqId.'berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($faqId)
    {
        Faq::where('id', $faqId)->delete();

        return redirect('/admin/faq')->with('status', 'faq dengan id ' .$faqId. ' berhasil dihapus');
    }
}
