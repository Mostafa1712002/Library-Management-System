<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case REJECTED = 'rejected';
    case BORROWED = 'borrowed';
    case DONE = 'done';
    case RESERVEREQUEST = 'reserve_request';
}
