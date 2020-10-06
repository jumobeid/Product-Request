<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 34,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 35,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 36,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 37,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 38,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 39,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 40,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 41,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 42,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 43,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 44,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 45,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 46,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 47,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 48,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 49,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 50,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 51,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 52,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 53,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 54,
                'title' => 'purchased_item_create',
            ],
            [
                'id'    => 55,
                'title' => 'purchased_item_edit',
            ],
            [
                'id'    => 56,
                'title' => 'purchased_item_show',
            ],
            [
                'id'    => 57,
                'title' => 'purchased_item_delete',
            ],
            [
                'id'    => 58,
                'title' => 'purchased_item_access',
            ],
            [
                'id'    => 59,
                'title' => 'supplier_create',
            ],
            [
                'id'    => 60,
                'title' => 'supplier_edit',
            ],
            [
                'id'    => 61,
                'title' => 'supplier_show',
            ],
            [
                'id'    => 62,
                'title' => 'supplier_delete',
            ],
            [
                'id'    => 63,
                'title' => 'supplier_access',
            ],
            [
                'id'    => 64,
                'title' => 'pending_invoice_create',
            ],
            [
                'id'    => 65,
                'title' => 'pending_invoice_edit',
            ],
            [
                'id'    => 66,
                'title' => 'pending_invoice_show',
            ],
            [
                'id'    => 67,
                'title' => 'pending_invoice_delete',
            ],
            [
                'id'    => 68,
                'title' => 'pending_invoice_access',
            ],
            [
                'id'    => 69,
                'title' => 'packing_slip_detail_create',
            ],
            [
                'id'    => 70,
                'title' => 'packing_slip_detail_edit',
            ],
            [
                'id'    => 71,
                'title' => 'packing_slip_detail_show',
            ],
            [
                'id'    => 72,
                'title' => 'packing_slip_detail_delete',
            ],
            [
                'id'    => 73,
                'title' => 'packing_slip_detail_access',
            ],
            [
                'id'    => 74,
                'title' => 'packing_slip_item_detail_create',
            ],
            [
                'id'    => 75,
                'title' => 'packing_slip_item_detail_edit',
            ],
            [
                'id'    => 76,
                'title' => 'packing_slip_item_detail_show',
            ],
            [
                'id'    => 77,
                'title' => 'packing_slip_item_detail_delete',
            ],
            [
                'id'    => 78,
                'title' => 'packing_slip_item_detail_access',
            ],
            [
                'id'    => 79,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
