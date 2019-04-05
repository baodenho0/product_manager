<div class="site-sidebar">
    <div class="custom-scroll custom-scroll-light">
        @php
            $permissions = \App\Permission::all();
            $per = '';
            foreach ($permissions as $permission){
                $tmp = explode('-',$permission->name);
                if(in_array('read',$tmp) && in_array('menu',$tmp)){
                    $type = $tmp[2];
                    if($per)
                        $per .= '|'.$permission->name;
                    else
                        $per .= $permission->name;
                }
            }
        @endphp
        <ul class="sidebar-menu">
            @include('layouts.items')
        </ul>
    </div>
</div>