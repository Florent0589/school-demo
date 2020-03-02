<?php

namespace App\Http\Controllers;

use App\EBook;
use Illuminate\Http\Request;
use App\Grade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class EBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ebooks = EBook::all();
        return view('ebooks.index', compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('ebooks.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $form_data = \request()->all();
        $file      = \request()->file('file');
        $uuid = Uuid::uuid4();

        if($file != null)
        {
            $file_size          = $file->getSize();
            $fileExtension      = $file->getClientOriginalExtension();
            $fileNameToSave     = $uuid.'.'.$fileExtension;

            $file->move(storage_path('app/public/Ebooks'), $fileNameToSave);

            $new_ebook                  = new EBook();
            $new_ebook->filename        = $form_data['name'];
            $new_ebook->uuid            = $uuid;
            $new_ebook->size            = $file_size;
            $new_ebook->file_type       = $form_data['type'];
            $new_ebook->downloads       = 0;
            $new_ebook->downloadable    = $form_data['downloadable'];
            $new_ebook->grade_id        = $form_data['grade_id'];
            $new_ebook->description     = $form_data['description'];
            $new_ebook->storage_path    = 'Ebooks/'.$fileNameToSave;
            $new_ebook->status_id       = 1;
            $new_ebook->created_by      = Auth::id();
            $new_ebook->save();
        }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
