<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class Resource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);

        self::loadIncludes($resource);
    }

    public static function collection($resource)
    {
        self::loadIncludes($resource);

        return parent::collection($resource);
    }

    public static function loadIncludes($resource)
    {
        try {
            $resource->loadMissing(self::getRequestIncludes());
        } catch (RelationNotFoundException $e) {
            abort(Response::HTTP_BAD_REQUEST, "Request include [{$e->relation}] not found");
        }
    }

    public static function getRequestIncludes()
    {
        $request = request();

        if ($request->has('include')) {
            return array_map('trim', explode(',', trim($request->include, ',')));
        }

        return [];
    }
}
