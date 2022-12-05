<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $get = DB::table('user')->get();


        // $data = new DateTime();

        // $agora = $data->format('d/m/Y');

        return \view('home', ['get' => $get]);
    }

    public function get()
    {
        $get = DB::table('user')->get();


        \print_r(\json_encode($get));

        return \view('api', ['get' => $get]);
    }

    public function insert()
    {

        $url = \filter_input(\INPUT_POST, 'link');
        $click = \filter_input(\INPUT_POST, 'click');
        $hoje = \filter_input(\INPUT_POST, 'data');
        $data = new DateTime();
        $agora = $data;
        if ($url and $click) {
            if ($click > 500) {
                return \redirect('/');
            }
            $insert = DB::table('user')->insert(['url' => $url, 'cliques' => $click, 'agora' => $agora]);
            return \redirect('/');
        } else {
            return \redirect('/');
        }

        return \view('home', [$url => 'url', $click => 'click', $agora => 'agora']);
    }

    public function edit($id)
    {
        $get = DB::table('user')->where('id', $id)->get();

        return \view('edit', ['id' => $id, 'get' => $get]);
    }

    public function update($id)
    {
        $url = \filter_input(\INPUT_POST, 'link');
        $click = \filter_input(\INPUT_POST, 'click');

        if ($url and $click) {
            $updata = DB::table('user')->where('id', $id)->update(['url' => $url, 'cliques' => $click]);
            return \redirect('/');
        } else {
            return \redirect("/edit$id");
        }

        return \view('edit', ['click' => $click, 'url' => $url]);
    }
}