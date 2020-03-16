<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function withCreated($resource)
    {
        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function withNoContent()
    {
        return \response('', Response::HTTP_NO_CONTENT);
    }
}
