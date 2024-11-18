<?php

namespace App\Http\Controllers;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $logM = LogM::create([
        //     'id_user' => Auth::user()->id,
        //     'activity' => 'User Log'
        // ]);
        
        $user = Auth::user();
        // $subtitle = "Daftar Aktivitas";

        // Define the base query
        $logM = LogM::with('user');

       

        // Order logs by ID in descending order (from newest to oldest)
        $log = $logM->orderBy('id', 'desc')->get();

        return view('log_index', compact('log'));
    }

}