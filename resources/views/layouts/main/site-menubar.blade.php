<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    {{-- Surveys Section --}}
                    <li class="site-menu-category">Surveys</li>
                    {{-- Dashboard--}}
                    <li class="site-menu-item {{ isPath('dashboard') }}">
                        <a class="animsition-link" href="/dashboard">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    {{-- Surveys --}}
                    <li class="site-menu-item has-sub {{ isPath('surveys', true) }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-chat-group" aria-hidden="true"></i>
                            <span class="site-menu-title">Surveys</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item {{ isPath('surveys') }}">
                                <a class="animsition-link" href="{{ route('surveys.index') }}">
                                    <span class="site-menu-title">Active Surveys</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {{-- Admin Section --}}
                    <li class="site-menu-category">Administration</li>
                    <li class="site-menu-item has-sub {{ isPath('admin/*', true) }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-wrench" aria-hidden="true"></i>
                            <span class="site-menu-title">Admin</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub {{ isPath('admin/users*') }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <span class="site-menu-title">Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        {{--<a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"--}}
           {{--data-original-title="Settings">--}}
            {{--<span class="icon wb-settings" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">--}}
            {{--<span class="icon wb-eye-close" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">--}}
            {{--<span class="icon wb-power" aria-hidden="true"></span>--}}
        {{--</a>--}}
    </div>
</div>