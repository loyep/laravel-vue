<div class="pl-2">
    @guest
        <a href="{{ route('login') }}">
            <el-button type="primary" size="small">登录</el-button>
        </a>
    @else
        <el-dropdown>
            <div>
                <span class="flex-avatar w-32">
                    <img alt="" src="{{ Auth::user()->avatar ?? getAvatar(Auth::user()->email) }}" class="avatar avatar-32 photo avatar-default" height="32" width="32" ><span class="avatar-status avatar-bottom"><span class="badge badge-pill badge-info font-theme text-xs mx-1">Lv.2</span></span>
                </span>
            </div>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>
                    <sign-in>
                        <i class="el-icon-date"></i>
                        <span class="text-xs">每日签到</span>
                    </sign-in>
                </el-dropdown-item>
                @if(Auth::user()->is_admin)
                    <el-dropdown-item>
                        <a href="{{ route('dashboard') }}">
                            <i class="el-icon-help"></i>
                            <span class="text-xs">后台系统</span>
                        </a>
                    </el-dropdown-item>
                @endif
                <el-dropdown-item>
                    <a href="{{ route('user.home') }}">
                        <i class="el-icon-user"></i>
                        <span class="text-xs">我的主页</span>
                    </a>
                </el-dropdown-item>
                <el-dropdown-item>
                    <a href="{{ route('user.profile') }}">
                        <i class="el-icon-setting"></i>
                        <span class="text-xs">账户设置</span>
                    </a>
                </el-dropdown-item>
                <el-dropdown-item divided>
                    <sign-out>
                        <i class="el-icon-switch-button"></i>
                        <span class="text-xs">退出登录</span>
                    </sign-out>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    @endguest
</div>
