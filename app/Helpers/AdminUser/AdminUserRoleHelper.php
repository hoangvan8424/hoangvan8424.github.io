<?php

namespace App\Helpers\AdminUser;

use Illuminate\Support\Facades\Auth;

if(!class_exists('AdminUserRoleHelper')) {
    class AdminUserRoleHelper {
        public static function setUpAccountUser() {
            $array = [
                "role_see_branch"               => 0,
                "role_add_branch"               => 0,
                "role_update_branch"            => 0,
                "role_delete_branch"            => 0,
                "role_see_department"           => 0,
                "role_add_department"           => 0,
                "role_update_department"        => 0,
                "role_delete_department"        => 0,
                "role_see_product"              => 0,
                "role_add_product"              => 0,
                "role_update_product"           => 0,
                "role_delete_product"           => 0,
                "role_see_product_demo"         => 0,
                "role_add_product_demo"         => 0,
                "role_update_product_demo"      => 0,
                "role_delete_product_demo"      => 0,
                "role_see_product_print"        => 0,
                "role_add_product_print"        => 0,
                "role_update_product_print"     => 0,
                "role_delete_product_print"     => 0,
                "role_see_customer"             => 0,
                "role_add_customer"             => 0,
                "role_update_customer"          => 0,
                "role_delete_customer"          => 0,
                "role_manage_user"              => 0,
                "role_active"                   => 0
            ];

            return json_encode($array);
        }

        /**
         * Admin
         */

        public static function setupAccountAdmin() {
            $array = [
                "role_see_branch"               => 1,
                "role_add_branch"               => 1,
                "role_update_branch"            => 1,
                "role_delete_branch"            => 1,
                "role_see_department"           => 1,
                "role_add_department"           => 1,
                "role_update_department"        => 1,
                "role_delete_department"        => 1,
                "role_see_product"              => 1,
                "role_add_product"              => 1,
                "role_update_product"           => 1,
                "role_delete_product"           => 1,
                "role_see_product_demo"         => 1,
                "role_add_product_demo"         => 1,
                "role_update_product_demo"      => 1,
                "role_delete_product_demo"      => 1,
                "role_see_product_print"        => 1,
                "role_add_product_print"        => 1,
                "role_update_product_print"     => 1,
                "role_delete_product_print"     => 1,
                "role_see_customer"             => 1,
                "role_add_customer"             => 1,
                "role_update_customer"          => 1,
                "role_delete_customer"          => 1,
                "role_manage_user"              => 1,
                "role_active"                   => 1
            ];

            return json_encode($array);
        }

        /**
         * Update Role
         */

        public static function updateAccountRole($data = array()) {
            $array_rule = array([
                "role_add_branch"               => !empty($data['role_add_branch']) ? 1:0,
                "role_update_branch"            => !empty($data['role_update_branch']) ? 1:0,
                "role_delete_branch"            => !empty($data['role_delete_branch']) ? 1:0,
                "role_add_department"           => !empty($data['role_add_department']) ? 1:0,
                "role_update_department"        => !empty($data['role_update_department']) ? 1:0,
                "role_delete_department"        => !empty($data['role_delete_department']) ? 1:0,
                "role_add_product"              => !empty($data['role_add_product']) ? 1:0,
                "role_update_product"           => !empty($data['role_update_product']) ? 1:0,
                "role_delete_product"           => !empty($data['role_delete_product']) ? 1:0,
                "role_add_product_demo"         => !empty($data['role_add_product_demo']) ? 1:0,
                "role_update_product_demo"      => !empty($data['role_update_product_demo']) ? 1:0,
                "role_delete_product_demo"      => !empty($data['role_delete_product_demo']) ? 1:0,
                "role_add_product_print"        => !empty($data['role_add_product_print']) ? 1:0,
                "role_update_product_print"     => !empty($data['role_update_product_print']) ? 1:0,
                "role_delete_product_print"     => !empty($data['role_delete_product_print']) ? 1:0,
                "role_add_customer"             => !empty($data['role_add_customer']) ? 1:0,
                "role_update_customer"          => !empty($data['role_update_customer']) ? 1:0,
                "role_delete_customer"          => !empty($data['role_delete_customer']) ? 1:0,
                "role_manage_user"              => !empty($data['role_manage_user']) ? 1:0,
                "role_active"                   => !empty($data['role_active']) ? 1:0
            ]);

            return json_encode($array_rule);
        }

        public static function rolesArray($json, $type = false) {
            return json_decode($json, $type);
        }

        public static function checkRole($key) {
            $role = json_decode(Auth::user()->todo, true);
            return $role[$key] === 1 ? true : false;
        }
    }
}
