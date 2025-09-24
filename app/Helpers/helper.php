<?php

use Devrabiul\ToastMagic\Facades\ToastMagic;

function toastAlert($type, $data)
{
    if ($type == 'success') {
        ToastMagic::success($data);
    } else if ($type == 'error') {
        ToastMagic::error($data);
    }
}