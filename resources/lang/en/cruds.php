<?php

return [
    'userManagement'        => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'            => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                  => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'                  => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'productManagement'     => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'productCategory'       => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'productTag'            => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product'               => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => ' ',
            'name'                             => 'Name',
            'name_helper'                      => ' ',
            'description'                      => 'Description',
            'description_helper'               => ' ',
            'price'                            => 'Price',
            'price_helper'                     => ' ',
            'category'                         => 'Categories',
            'category_helper'                  => ' ',
            'tag'                              => 'Tags',
            'tag_helper'                       => ' ',
            'photo'                            => 'Photo',
            'photo_helper'                     => ' ',
            'created_at'                       => 'Created at',
            'created_at_helper'                => ' ',
            'updated_at'                       => 'Updated At',
            'updated_at_helper'                => ' ',
            'deleted_at'                       => 'Deleted At',
            'deleted_at_helper'                => ' ',
            'packing_slip_item_details'        => 'Packing Slip Item Details',
            'packing_slip_item_details_helper' => ' ',
        ],
    ],
    'basicCRM'              => [
        'title'          => 'Basic CRM',
        'title_singular' => 'Basic CRM',
    ],
    'crmStatus'             => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmCustomer'           => [
        'title'          => 'Customers',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'first_name'         => 'First name',
            'first_name_helper'  => ' ',
            'last_name'          => 'Last name',
            'last_name_helper'   => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'phone'              => 'Phone',
            'phone_helper'       => ' ',
            'address'            => 'Address',
            'address_helper'     => ' ',
            'skype'              => 'Skype',
            'skype_helper'       => ' ',
            'website'            => 'Website',
            'website_helper'     => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'crmNote'               => [
        'title'          => 'Notes',
        'title_singular' => 'Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmDocument'           => [
        'title'          => 'Purchase Orders',
        'title_singular' => 'Purchase Order',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'customer'                   => 'Customer',
            'customer_helper'            => ' ',
            'document_file'              => 'File',
            'document_file_helper'       => ' ',
            'name'                       => 'Document name',
            'name_helper'                => ' ',
            'description'                => 'Description',
            'description_helper'         => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated At',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted At',
            'deleted_at_helper'          => ' ',
            'purchased_items'            => 'Purchased Items',
            'purchased_items_helper'     => ' ',
            'pending_invoice'            => 'Pending Invoice',
            'pending_invoice_helper'     => ' ',
            'packing_slip_detail'        => 'Packing Slip Detail',
            'packing_slip_detail_helper' => ' ',
        ],
    ],
    'purchasedItem'         => [
        'title'          => 'Purchase Item order details',
        'title_singular' => 'Purchase Item order detail',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'quantity'                    => 'Quantity',
            'quantity_helper'             => ' ',
            'price'                       => 'Price',
            'price_helper'                => ' ',
            'product'                     => 'Product',
            'product_helper'              => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'packing_slip_details'        => 'Packing Slip Details',
            'packing_slip_details_helper' => ' ',
        ],
    ],
    'supplier'              => [
        'title'          => 'Supplier',
        'title_singular' => 'Supplier',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'pending_invoices'        => 'Pending Invoices',
            'pending_invoices_helper' => ' ',
            'purchase_orders'         => 'Purchase Orders',
            'purchase_orders_helper'  => ' ',
        ],
    ],
    'pendingInvoice'        => [
        'title'          => 'Pending Invoices',
        'title_singular' => 'Pending Invoice',
        'fields'         => [
            'id'                                  => 'ID',
            'id_helper'                           => ' ',
            'created_at'                          => 'Created at',
            'created_at_helper'                   => ' ',
            'updated_at'                          => 'Updated at',
            'updated_at_helper'                   => ' ',
            'deleted_at'                          => 'Deleted at',
            'deleted_at_helper'                   => ' ',
            'pending_invoice_total_amount'        => 'Pending Invoice Total Amount',
            'pending_invoice_total_amount_helper' => ' ',
            'invoice_due_date'                    => 'Invoice Due Date',
            'invoice_due_date_helper'             => ' ',
            'discount_code'                       => 'Discount Code',
            'discount_code_helper'                => ' ',
            'tax'                                 => 'Tax',
            'tax_helper'                          => ' ',
        ],
    ],
    'packingSlipDetail'     => [
        'title'          => 'Packing Slip Details',
        'title_singular' => 'Packing Slip Detail',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => ' ',
            'packing_slip_number'              => 'Packing Slip Number',
            'packing_slip_number_helper'       => ' ',
            'created_at'                       => 'Created at',
            'created_at_helper'                => ' ',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => ' ',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => ' ',
            'packing_slip_item_details'        => 'Packing Slip Item Details',
            'packing_slip_item_details_helper' => ' ',
        ],
    ],
    'packingSlipItemDetail' => [
        'title'          => 'Packing Slip Item Details',
        'title_singular' => 'Packing Slip Item Detail',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'received_item_qty'        => 'Received Item Qty',
            'received_item_qty_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
];
