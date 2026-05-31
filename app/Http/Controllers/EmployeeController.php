<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        $stats = [
            'total'      => $employees->count(),
            'active'     => $employees->where('status', 'active')->count(),
            'departments'=> $employees->pluck('department')->unique()->count(),
            'avg_salary' => $employees->avg('salary') ?? 0,
        ];

        return view('employees.index', compact('employees', 'stats'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'unique:employees,email'],
            'phone'      => ['nullable', 'string', 'max:20'],
            'department' => ['required', 'string'],
            'position'   => ['required', 'string', 'max:100'],
            'salary'     => ['nullable', 'numeric', 'min:0'],
        ]);

        $data['hire_date'] = now()->toDateString();

        Employee::create($data);

        return redirect()->route('home')->with('success', 'Employee added successfully!');
    }

    public function destroy(int $id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Employee deleted.');
    }
}
