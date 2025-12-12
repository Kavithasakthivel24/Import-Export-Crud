<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TaskImport;
use App\Exports\TaskExport;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:tasks',
            'phone' => 'required',
        ]);
            Task::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => $request->password,
        ]);

        return redirect()->route('tasks.index');

        // $task = new Task();
        // $task->name = $request->input('name');
        // $task->email = $request->input('email');
        // $task->password = $request->input('password');
        // $task->save();

        // Task::create($request->all());
        //return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findorfail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findorfail($id);
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
            $task->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => $request->password,
        ]);

        return redirect()->route('tasks.index');
        // $task = new Task();
        // $task->name = $request->input('name');
        // $task->email = $request->input('email');
        // $task->password = $request->input('password');
        // $task->save();

        // $task->update($request->all());
        // return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();   // Soft delete
        return redirect()->route('tasks.index');
    }

    // 🔹 View Trash
    public function trash()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('tasks.trash', compact('tasks'));
    }

    // 🔹 Restore Soft Delete
    public function restore($id)
    {
        Task::withTrashed()->find($id)->restore();
        return redirect()->route('tasks.trash');
    }

    // 🔹 Permanent Delete
    public function forceDelete($id)
    {
        Task::withTrashed()->find($id)->forceDelete();
        return redirect()->route('tasks.trash');
    }

    // 🔹 Import
    public function import(Request $request)
    {
        Excel::import(new TaskImport, $request->file('file'));
        return back();
    }

    // 🔹 Export
    public function export()
    {
        return Excel::download(new TaskExport, 'tasks.xlsx');
    }
}

?>