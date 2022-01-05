<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
        </x-slot>

        <form method="GET" action="{{ route('login') }}" class="form">
            @csrf
            <div class="form-content">会員登録ありがとうございます</div>

            <div class="item-container">
                <x-button class="button">
                    {{ __('ログインする') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<style>
    .header{
        padding: 30px 5% 10px;
    }
    .form{
        width: 30%;
        margin: 100px auto;
        padding: 100px 50px;
        border-radius: 5px;
        box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, .5);
        background-color: #fff;
    }
    .form-content{
        font-size: 32px;
        text-align: center;
    }
    .item-container{
        padding-top: 50px;
    }
    .button{
        background-color: #305DFF;
        color: #fff;
        border-radius: 6px;
        padding: 5px 10px;
        display: block;
        margin: 0 auto;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }
</style>