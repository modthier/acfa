<?php

namespace App\Http\Controllers;

use App\Models\CertificateId;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Support\MediaStream;

class CertificateIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.cert.index');
    }

   public function search (Request $request)
   {
       $this->validate($request,[
            'cert_id' => 'required'
       ]);

       $result = CertificateId::where('certificate_id',$request->cert_id)->get();

       return view('main.cert.search')->with('result',$result);
   }

   public function download($id)
   {
        $cert = CertificateId::findOrFail($id);
        $downloads = $cert->getMedia('cert');

        return MediaStream::create('my-cert.zip')->addMedia($downloads);
   }
}
