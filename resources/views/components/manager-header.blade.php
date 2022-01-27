<div class="admin-header">
  @if(Auth::check())
  <nav class="nav" id="nav">
    <a href="{{ route('manager.index') }}" class="header-ttl">Rese</a>
    <ul class="ul">
      <li class="li">
        <form name="logout_form" method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="hidden" name="logout" class="link-logout__input">
        </form>
        <a class="header-link" href="{{ route('logout') }}"
            onclick="document.logout_form.submit();return false;"
            >Logout
        </a>
      </li>
    </ul>
  </nav>
  @else
  <div class="header-ttl">Rese</div>
  @endif
</div>

<style>
  .nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .header-ttl{
    color: #1587D3;
    font-size: 36px;
    font-weight: bold;
    margin-left: 20px;
    text-decoration: none;
  }
  .header-link{
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    color: #1587D3;

  }
</style>