<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class XMLRequestController extends Controller
{
    public function getRegions() {
        return DB::table('regions')
            ->select('*')
            ->get()
            ->toJson();
    }

    public function getProvinces($regcode) {
        return DB::table('provinces')
            ->select('*')
            ->where('region_id', '=', $regcode)
            ->get()
            ->toJson();
    }

    public function getCityMun($provcode) {
        return DB::table('municipalities')
            ->select('*')
            ->where('province_id', '=', $provcode)
            ->get()
            ->toJson();
    }

    public function getBarangay($citymuncode) {
        return DB::table('barangays')
            ->select('*')
            ->where('municipality_id', '=', $citymuncode)
            ->get()
            ->toJson();
    }

    public function readNotifs($id) {
        $user = User::find($id);
        $user->unreadNotifications->markAsRead();
        // return json_encode($user->unreadNotifications);
    }
}
