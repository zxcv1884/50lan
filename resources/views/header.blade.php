
    @if (Route::has('login'))
        <div class="links pageHeader">
            @auth
                <div class="s_m">
                    <a href="{{ route('drinks.index') }}" >50嵐</a>
                </div>
                <a href="{{route('logout')}}">登出</a>
                <a href="{{ route('serve.index') }}">訂單</a>
                <a href="{{ route('all.index') }}">所有訂單</a>
                <a href="{{ route('edit-types.index') }}">管理種類</a>
                <a href="{{ route('edit-drinks.index') }}">管理飲料</a>
            @else
                    <div class="s_m">
                        <a href="{{ route('drinks.index') }}" >50嵐</a>
                    </div>
                    <a href="{{ route('login') }}">管理員登入</a>
                    <a href="{{ route('register') }}">管理員註冊</a>
                    <a href="{{ route('drinks.create') }}">點飲料</a>
            @endauth
        </div>
    @endif