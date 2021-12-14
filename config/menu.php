<?php 

return [

    [
        'label' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'fa-tachometer-alt'
    ],
    [
        'label' => 'Quản lý Văn bản đến',
        'route' => 'vanBanDen.index',
        'icon' => 'fa-envelope-open-text',
        'items' => [
            [
                'label' => 'Danh sách văn bản đến',
                'route' => 'vanBanDen.index',
            ], 
            [
                'label' => 'Thêm mới văn bản đến',
                'route' => 'vanBanDen.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý Văn bản đi',
        'route' => 'vanBanDi.index',
        'icon' => 'fa-external-link-alt',
        'items' => [
            [
                'label' => 'Danh sách văn bản đi',
                'route' => 'vanBanDi.index',
            ], 
            [
                'label' => 'Thêm mới văn bản đi',
                'route' => 'vanBanDi.create',
            ]
        ]
    ],
    [
        'label' => 'Tra cứu văn bản',
        'route' => 'admin.dashboard',
        'icon' => 'fa-search'
    ],
    [
        'label' => 'Báo cáo văn bản',
        'route' => 'admin.dashboard',
        'icon' => 'fa-line-chart',
        'items' => [
            [
                'label' => 'Danh sách văn bản đến',
                'route' => 'vanBanDen.index',
            ], 
            [
                'label' => 'Danh sách văn bản đi',
                'route' => 'vanBanDi.index',
            ]
        ]
    ],
    [
        'label' => 'Quản trị hệ thống',
        'route' => 'admin.dashboard',
        'icon' => 'fa-laptop-code',
        'items' => [
            [
                'label' => 'Danh sách bộ phận',
                'route' => 'theLoai.index',
            ], 
            [
                'label' => 'Danh sách chức danh',
                'route' => 'hinhThuc.index',
            ], 
            [
                'label' => 'Danh sách cơ quan',
                'route' => 'doKhan.index',
            ], 
            [
                'label' => 'Danh sách độ khẩn',
                'route' => 'doMat.index',
            ], 
            [
                'label' => 'Danh sách độ mật',
                'route' => 'trangThai.index',
            ], 
            [
                'label' => 'Danh sách hình thức',
                'route' => 'chucDanh.index',
            ], 
            [
                'label' => 'Danh sách hình thức chuyển',
                'route' => 'coQuan.index',
            ], 
            [
                'label' => 'Danh sách hình thức lưu',
                'route' => 'hinhThuc.index',
            ], 
            [
                'label' => 'Danh sách lĩnh vực',
                'route' => 'hinhThuc.index',
            ], 
            [
                'label' => 'Danh sách thể loại',
                'route' => 'hinhThuc.index',
            ], 
            [
                'label' => 'Danh sách trạng thái',
                'route' => 'hinhThuc.index',
            ]
        ]
    ],
]

?>