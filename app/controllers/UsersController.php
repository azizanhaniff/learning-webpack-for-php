<?php

namespace App\Controllers;

use Core\App;

class UsersController {
    public function index() {
        $users = App::get('database')->selectAll('users', 'User');

        return view('users', compact('users'));
    }

    public function store() {
        App::get('database')->insert('users', [
            'full_name' => $_POST['full_name'],
            'display_name' => $_POST['full_name']
        ]);

        return redirect('users');
    }
}
