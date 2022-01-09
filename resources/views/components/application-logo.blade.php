<div class="logo">
    @if(Auth::check())
    <nav class="nav" id="nav">
        <ul class="ul">
            <li class="li">
                <a class="link" href="{{ route('shop.index') }}">Home</a>
            </li>
            <li class="li">
                <form name="logout_form" method="POST" action="{{ route('logout') }}" class="form">
                    @csrf
                    <input type="hidden" name="logout" class="link-logout__input">
                </form>
                <a class="link" href="{{ route('logout') }}"
                    onclick="document.logout_form.submit();return false;"
                    >Logout
                </a>
            </li>
            <li class="li">
                <a class="link" href="{{ route('user.index') }}">Mypage</a>
            </li>
        </ul>
    </nav>
    @else
    <nav class="nav" id="nav">
        <ul class="ul">
            <li class="li">
                <a class="link" href="{{ route('shop.index') }}">Home</a>
            </li>
            <li class="li">
                <a class="link" href="{{ route('register') }}">Registration</a>
            </li>
            <li class="li">
                <a class="link" href="{{ route('login') }}">Login</a>
            </li>
        </ul>
    </nav>
    @endif
    <img id="menu" class="logo-img" src="/image/Rese-icon.png">
    <a href="{{ route('shop.index') }}" class="logo-ttl">
        Rese
    </a>
</div>

<script>
    const target = document.getElementById("menu");
    target.addEventListener('click', () => {
        if(target.getAttribute('src') == '/image/Rese-icon.png'){
            target.setAttribute('src','/image/close.png');
            const nav = document.getElementById("nav");
            nav.classList.toggle('in');
        } else {
            target.setAttribute('src','/image/Rese-icon.png');
            const nav = document.getElementById("nav");
            nav.classList.toggle('in');
        }
    });
</script>

<style>
    .logo{
        display: flex;
        align-items: center;
    }
    .logo-img{
        width: 50px;
        height: 50px;
        cursor: pointer;
        position: relative;
        z-index: 4;
    }
    .logo-ttl{
        color: #305DFF;
        font-size: 36px;
        font-weight: bold;
        margin-left: 20px;
        text-decoration: none;
    }
    .link{
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        color: #305DFF;
    }
    .nav{
        position: fixed;
        height: 100vh;
        width: 100%;
        top: 0;
        left: -100%;
        background-color: #fff;
        transition: .7s;
        text-align: center;
        z-index: 3;
    }
    .ul{
        padding-top: 200px;
    }
    .li{
        margin-top: 50px;
    }
    .in{
        transform: translateX(100%);
    }
</style>