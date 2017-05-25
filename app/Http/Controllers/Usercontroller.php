<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller {

    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     */
    public function show( $id ) {
        return view('user.profile', [ 'user' => User::findOrFail($id) ]);
    }

}
