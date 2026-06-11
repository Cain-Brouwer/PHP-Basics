<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PraktijkmanagementController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function index()
    {
        // View
        return view('praktijkmanagement.index', [
            'title' => 'Praktijkmanagement Home',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userModel->sp_GetUserById($id);
        $userroles = $this->userModel->sp_GetAllUserroles();

        return view('Praktijkmanagement.edit', [
            'title' => 'Gebruikersrol wijzigen',
            'user' => $user,
            'userroles' => $userroles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rolename' => ['required', 'string', 'max:20'],
        ]);

        $this->userModel->sp_UpdateUser($id, $request->rolename);

        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'Gebruikersrol succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userModel->sp_DeleteUser($id);

        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'Gebruiker succesvol verwijderd.');
    }

    public function manageUserroles()
    {
        $users = $this->userModel->sp_GetAllUsers(auth()->user()->id);

        return view('Praktijkmanagement.userroles', [
            'title' => 'Gebruikersrollen',
            'users' => $users,
        ]);
    }
}
