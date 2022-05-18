<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView {
  public function view(): View {
    $users = User::findOrFail(session('search-asesor'));
    session()->forget('search-asesor');
    return view('exports.users', compact('users'));
  }
}
