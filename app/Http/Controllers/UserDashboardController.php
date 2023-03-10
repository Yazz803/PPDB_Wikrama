<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserDashboardController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.allUser');
    }
}
