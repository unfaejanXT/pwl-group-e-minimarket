<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel 'users'
        $users = User::all(['name', 'email']);

        // Mengambil data dari tabel 'branches'
        $branches = Branch::all(['nama']);

        // Mengambil data dari tabel 'employees' dengan join ke 'users' dan 'branches'
        $employees = Employee::join('users', 'employees.user_id', '=', 'users.id')
            ->join('branches', 'employees.cabang_id', '=', 'branches.id')
            ->select('users.name', 'users.email', 'branches.nama as branch_name', 'employees.jabatan', 'employees.phone_number', 'employees.address')
            ->get();

        // Mengirim data ke view untuk ditampilkan
        return view('employee.index', compact('users', 'branches', 'employees'));
    }
}
