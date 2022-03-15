<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateId;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CertificateIdFormRequest;

class CertificateIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.certid.index')
            ->with([
                'certs' => CertificateId::orderBy('id','desc')->paginate(20)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.certid.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificateIdFormRequest $request)
    {
        $data = [
            'certificate_name' => $request->certificate_name,
            'certificate_id' => $request->certificate_id,
            'user_id' => $request->user_id,
            'issue_date' => $request->issue_date
        ];

        $cert = CertificateId::create($data);

        if ($request->hasFile('image')) {
            $cert->addMedia($request->image)->toMediaCollection('cert');
        }

        if($cert) {
            session()->flash('message','Certificate Save Successfull');
            return redirect()->route('admin.certificateId.index');
        }else {
            return redirect()->route('admin.certificateId.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateId  $certificateId
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateId $certificateId)
    {
        return view('admin.certid.show')
        ->with([
            'certificateId' => $certificateId
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateId  $certificateId
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateId $certificateId)
    {
        return view('admin.certid.edit')
            ->with([
                'certId' => $certificateId,
                'users' => User::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateId  $certificateId
     * @return \Illuminate\Http\Response
     */
    public function update(CertificateIdFormRequest $request, CertificateId $certificateId)
    {
        $data = [
            'certificate_name' => $request->certificate_name,
            'certificate_id' => $request->certificate_id,
            'user_id' => $request->user_id,
            'issue_date' => $request->issue_date
        ];

        $certificateId->update($data);

        if ($request->hasFile('image')) {
            $imageItem = $certificateId->getMedia('cert');
            if ($imageItem->first() != null) {
                Storage::disk('public')->delete($imageItem->first()->id."\\".$imageItem->first()->file_name);
                Storage::deleteDirectory(storage_path('app/public/'.$imageItem->first()->id));
                $imageItem[0]->delete();
            }
            $certificateId->addMedia($request->image)->toMediaCollection('cert');
        }

        if($certificateId) {
            session()->flash('message','Certificate Save Successfull');
            return redirect()->route('admin.certificateId.index');
        }else {
            return redirect()->route('admin.certificateId.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateId  $certificateId
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateId $certificateId)
    {
        //
    }
}
