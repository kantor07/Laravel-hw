<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;
use App\Services\Contracts\Parser;
use App\Models\Source;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = Source::all()->pluck('url');

        foreach($urls as $url) {
            \dispatch(new JobNewsParsing($url));
        }

        return "Parsing complited";

    }
}
