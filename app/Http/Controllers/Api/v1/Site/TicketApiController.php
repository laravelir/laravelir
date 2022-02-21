<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Ticket;

class TicketApiController extends BaseApiController
{
    public function index()
    {
        $tickets = Ticket::latest()->get();
    }
}
