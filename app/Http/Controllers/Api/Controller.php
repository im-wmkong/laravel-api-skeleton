<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    public function withCreated($resource)
    {
        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function withNoContent()
    {
        return \response('', Response::HTTP_NO_CONTENT);
    }
}
