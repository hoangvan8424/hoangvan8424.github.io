<?php
    use Illuminate\Support\Facades\Auth;
    if(!function_exists('getDataUser'))
    {
        function get_data_user($type, $field = 'id')
        {
            return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
        }
    }
