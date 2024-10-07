<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\addressList;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(Request $request)
    {
        // Store employee data and get the employee ID
        $employee = Employee::create([
            'cus_name' => $request->cName,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'post' => $request->post,
        ]);

        $addDet = [];
        foreach ($request->addNo1 as $key => $tb) {
            $addNo2 = $request->addNo1[$key];
            $street2 = $request->street1[$key];
            $city2 = $request->city1[$key];

            $addDet[] = [
                'address_no' => $addNo2,
                'street' => $street2,
                'city' => $city2,
                'cus_id' => $employee->id,
            ];
        }

        AddressList::insert($addDet);

        return response()->json([
            'status' => 200,
            'message' => 'Employee and addresses stored successfully!',
        ]);
    }

    public function fetchAll()
    {
        $emps = Employee::all();
        $output = '';

        if ($emps->count() > 0) {
            $output .= '
    <table id="employeesTable" class="table table-striped table-sm table-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

foreach ($emps as $emp) {
    $output .= '
        <tr>
            <td>' . e($emp->id) . '</td>
            <td>' . e($emp->cus_name) . '</td>
            <td>' . e($emp->company) . '</td>
            <td>' . e($emp->email) . '</td>
            <td>' . e($emp->phone) . '</td>
            <td>' . e($emp->post) . '</td>
            <td>
                <a href="#" id="' . e($emp->id) . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
                    <i class="bi-pencil-square"></i>
                </a>
                <a href="#" id="' . e($emp->id) . '" class="text-danger mx-1 deleteIcon">
                    <i class="bi-trash"></i>
                </a>
            </td>
        </tr>';

    // Fetch addresses related to the customer
    $addresses = AddressList::where('cus_id', $emp->id)->get();
    if ($addresses->count() > 0) {
        foreach ($addresses as $add) {
            $output .= '
            <tr class="address-row">
                <td></td>
                <td>' . e($add->address_no) . '</td>
                <td colspan="2">' . e($add->street) . '</td>
                <td colspan="3">' . e($add->city) . '</td>
            </tr>';
        }
    }
}

$output .= '
        </tbody>
    </table>';

        } else {
            $output = '<h2 class="text-center text-secondary py-5">No Records Found in database!</h2>';
        }

        echo $output;
    }



    public function edit(Request $request)
    {
        $id = $request->id;
        $res['emps'] = employee::find($id);
        $res['address'] = AddressList::where('cus_id', $id)->get();
        return response()->json($res);
    }

    public function update(Request $request)
    {
        // Find the employee by ID
        $emp = Employee::find($request->emp_id);

        // Check if the employee exists
        if (!$emp) {
            return response()->json([
                'status' => 404,
                'message' => 'Employee not found'
            ]);
        }

        // Prepare employee data for update
        $empData = [
            'cus_name' => $request->cName,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'post' => $request->post,
        ];

        // Delete existing addresses for the employee
        AddressList::where('cus_id', $emp->id)->delete();

        // Prepare address data for insertion
        $addDet = [];
        if ($request->has('addNo1')) { // Check if addNo1 is present in the request
            foreach ($request->addNo1 as $key => $addNo2) {
                $addDet[] = [
                    'address_no' => $addNo2,
                    'street' => $request->street1[$key],
                    'city' => $request->city1[$key],
                    'cus_id' => $emp->id, // Use employee ID
                ];
            }
        }

        // Insert new addresses
        if (!empty($addDet)) {
            AddressList::insert($addDet);
        }

        // Update the employee record
        $emp->update($empData);

        // Return response
        return response()->json([
            'status' => 200,
            'message' => 'Employee updated successfully'
        ]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        employee::where('id', $id)->delete();
        AddressList::where('cus_id', $id)->delete();
    }
}
