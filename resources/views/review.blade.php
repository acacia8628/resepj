<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-application-logo/>
            </header>
            <div class="review-form">
                <div class="review-name">{{$shop->name}}</div>
                <div class="review-img-box">
                    <img class="review-img" src="{{$shop->img_url}}">
                </div>

                @if($shop->is_reviewed_by_auth_user())
                <form method="POST" action="{{ route('reviews.update', $user_review->id) }}">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    @if($errors->has('shop_id'))
                    <div class="error">
                        *{{$errors->first('shop_id')}}
                    </div>
                    @endif

                    <div class="score-form">
                        <input id="star5" type="radio" name="score" value="5"
                            @if($user_review->score == 5) checked @endif>
                        <label for="star5">★</label>
                        <input id="star4" type="radio" name="score" value="4"
                            @if($user_review->score == 4) checked @endif>
                        <label for="star4">★</label>
                        <input id="star3" type="radio" name="score" value="3"
                            @if($user_review->score == 3) checked @endif>
                        <label for="star3">★</label>
                        <input id="star2" type="radio" name="score" value="2"
                            @if($user_review->score == 2) checked @endif>
                        <label for="star2">★</label>
                        <input id="star1" type="radio" name="score" value="1"
                            @if($user_review->score == 1) checked @endif>
                        <label for="star1">★</label>
                    </div>
                    @if($errors->has('score'))
                    <div class="error">
                        *{{$errors->first('score')}}
                    </div>
                    @endif

                    <div class="review-comment-box">
                        <label for="comment" class="review-comment__label">コメント</label>
                        <textarea id="comment"
                            name="comment"
                            rows="5"
                            cols="40"
                            class="comment">{{$user_review->comment}}</textarea>
                    </div>
                    @if($errors->has('comment'))
                    <div class="error">
                        *{{$errors->first('comment')}}
                    </div>
                    @endif

                    <button type="submit" class="review-button">編集する</button>
                </form>
                @else
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    @if($errors->has('shop_id'))
                    <div class="error">
                        *{{$errors->first('shop_id')}}
                    </div>
                    @endif

                    <div class="score-form">
                        <input id="star5" type="radio" name="score" value="5">
                        <label for="star5">★</label>
                        <input id="star4" type="radio" name="score" value="4">
                        <label for="star4">★</label>
                        <input id="star3" type="radio" name="score" value="3">
                        <label for="star3">★</label>
                        <input id="star2" type="radio" name="score" value="2">
                        <label for="star2">★</label>
                        <input id="star1" type="radio" name="score" value="1">
                        <label for="star1">★</label>
                    </div>
                    @if($errors->has('score'))
                    <div class="error">
                        *{{$errors->first('score')}}
                    </div>
                    @endif

                    <div class="review-comment-box">
                        <label for="comment" class="review-comment__label">コメント</label>
                        <textarea id="comment"
                            name="comment"
                            class="comment"
                            ></textarea>
                    </div>
                    @if($errors->has('comment'))
                    <div class="error">
                        *{{$errors->first('comment')}}
                    </div>
                    @endif

                    @if($shop->is_reserved_by_auth_user())
                    <button type="submit" class="review-button">送信</button>
                    @else
                    <div class="not-reserved">当店をご予約、ご利用後にレビューを投稿することができます。</div>
                    @endif
                </form>
                @endif
            </div>

            <div class="review-all">
                <div class="review-all__ttl">お客様の声</div>
                @foreach($reviews as $review)
                <div class="review-content">
                    <div class="score">
                        <img src="/image/people.png" class="score-img-people">
                        <div class="star-rating">
                            <div class="star-rating-front" style="width: {{$review->score_percentage()}}%"
                            >★★★★★</div>
                            <div class="star-rating-back">★★★★★</div>
                        </div>
                    </div>
                    <div class="review-comment">
                        {{$review->comment}}
                    </div>
                    @if(Auth::id() == $review->user_id)
                    <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="review-delete">
                        @csrf
                        <img class="review-delete__img" src="/image/delete.png">
                        <input type="hidden" name="_method" value="DELETE">
                        <input class="review-delete__input" type="submit" name="delete" value="{{$review->id}}">
                    </form>
                    @endif
                </div>
                @endforeach
            </div>
            {{$reviews->appends(request()->input())->links()}}
        </x-slot>
    </x-auth-card>
</x-guest-layout>