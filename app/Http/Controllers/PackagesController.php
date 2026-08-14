<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\AdCategory;
use App\AdPages;
use App\AdPositions;
use DB;
use Response;
use App\Http\Requests\CreatePackageValidationForAdd;


class PackagesController extends Controller
{

	 public function listPackages()
    {
        $packages = Package::orderBy('created_at', 'desc')->where('status' ,'>=' ,1)->paginate(10);
        return view('package.package_list', compact('packages'));
    }

    

    public function createPackage()
    {
        $adCategorys = AdCategory::where('status',1)->get();
        $adPages = AdPages::where('status',1)->get();
        $adPositions = AdPositions::where('status',1)->get();
        return view('package.create_package', compact('adCategorys','adPages','adPositions'));

    }
    public function savePackage(CreatePackageValidationForAdd $request)
    {
        $package = new Package;

        $package->name = $request->name;
        $package->adcategory_id = $request->adcategory_id;
        $package->adpage_id = $request->adpage_id;
        $package->adposition_id = $request->adposition_id;
        $package->price = $request->price;
        $package->duration = $request->duration;
        $package->status = 1;
        $package->save();

        return redirect('/dashboard/admin/packages');
    }

    public function editPackage($id)
    {
        $adCategorys = AdCategory::where('status',1)->get();
        $adPages = AdPages::where('status',1)->get();
        $adPositions = AdPositions::where('status',1)->get();
        $package = Package::find($id);
        return view('package.edit_package', compact('package','adCategorys','adPages','adPositions'));
    }

     public function updatePackage(CreatePackageValidationForAdd $request, $id)
    {
        $package = Package::find($id);
        $packageUpdate = $request->all();
        $package->update($packageUpdate);
        return redirect('/dashboard/admin/packages');
    }

    public function packageDelete($id)
    {
     
        DB::table('packages')
            ->where('id', $id)
            ->update(['status' => 0]);
        return Response::json(['success' => 'removed']);

    }

     public function packageStatusChange($package_id, $status_id)
    {
        if ($status_id == 1) {
            $new_status = 2;
        } else if ($status_id == 2) {
            $new_status = 1;
        }  else if ($status_id == 0) {
            $new_status = 2;
        }
        DB::table('packages')
            ->where('id', $package_id)
            ->update(['status' => $new_status]);
        return Response::json(['success' => $new_status]);
    }

    public function packageRestore($id, $status_id)
    {
        if ($status_id == 0) {
            $new_status = 1;
        }
        DB::table('packages')
            ->where('id', $id)
            ->update(['status' => $new_status]);

        return redirect('/dashboard/admin/packages');
        

    }

     public function packageTrash()
    {
        $packages = Package::orderBy('created_at', 'desc')->where('status', 0)->paginate(10);
        return view('package.trash_package', compact('packages'));
    }

}
