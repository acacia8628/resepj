<x-guest-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/manager/course.css') }}">
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <header class="header">
                <x-manager-header/>
            </header>
        </x-slot>

        <div class="course">
          <button type="button" onClick="history.back()" style="margin-bottom:20px;">戻る</button>
          <h2 class="ttl">コースの追加</h2>
          <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" class="add-course">
            @csrf
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <div class="item-container">
              <label class="label" for="course_name">コース名</label>
              <input type="text" name="course_name" class="input">
            </div>
            @if($errors->has('course_name'))
              <div class="error">
                *{{$errors->first('course_name')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_overview">概要</label>
              <textarea id="course_overview"
                      name="course_overview"
                      rows="5"
                      cols="40"
                      class="textarea"></textarea>
            </div>
            @if($errors->has('course_overview'))
              <div class="error">
                *{{$errors->first('course_overview')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_detail">コース説明</label>
              <textarea id="course_detail"
                      name="course_detail"
                      rows="5"
                      cols="40"
                      class="textarea"></textarea>
            </div>
            @if($errors->has('course_detail'))
              <div class="error">
                *{{$errors->first('course_detail')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_price">料金</label>
              <input type="number" name="course_price" class="input">
            </div>
            @if($errors->has('course_price'))
              <div class="error">
                *{{$errors->first('course_price')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_img_file">コース画像を選択</label>
              <input type="file" name="course_img_file" value="" accept='image/*' onchange="previewImage(this);">
              <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:400px;">
            </div>
            @if($errors->has('course_img_file'))
              <div class="error">
                *{{$errors->first('course_img_file')}}
              </div>
            @endif
            <button type="submit" class="button">追加する</button>
          </form>

          <h2 class="ttl">コース一覧</h2>
          @foreach($courses as $course)
          <form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data" class="reserve">
            @method('PATCH')
            @csrf
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <div class="item-container">
              <label class="label" for="course_name">コース名</label>
              <input type="text" name="course_name" value="{{$course->name}}" class="input">
            </div>
            @if($errors->has('course_name'))
              <div class="error">
                *{{$errors->first('course_name')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_overview">概要</label>
              <textarea id="course_overview"
                      name="course_overview"
                      rows="5"
                      cols="40"
                      class="textarea">{{$course->overview}}</textarea>
            </div>
            @if($errors->has('course_overview'))
              <div class="error">
                *{{$errors->first('course_overview')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_detail">コース説明</label>
              <textarea id="course_detail"
                      name="course_detail"
                      rows="5"
                      cols="40"
                      class="textarea">{{$course->course_detail}}</textarea>
            </div>
            @if($errors->has('course_detail'))
              <div class="error">
                *{{$errors->first('course_detail')}}
              </div>
            @endif
            <div class="item-container">
              <label class="label" for="course_price">料金</label>
              <input type="number" name="course_price" class="input" value="{{$course->price}}">
            </div>
            @if($errors->has('course_price'))
              <div class="error">
                *{{$errors->first('course_price')}}
              </div>
            @endif
            <div class="item-container">
              <p class="label">現在の画像</p>
              <img src="{{$course->course_img_path}}" class="img">
            </div>
            <div class="item-container">
              <label class="label" for="course_img_file">コース画像を選択</label>
              <input type="file" name="course_img_file" value="" accept='image/*' onchange="previewImage(this);">
              <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:400px;">
            </div>
            @if($errors->has('course_img_file'))
              <div class="error">
                *{{$errors->first('course_img_file')}}
              </div>
            @endif
            <button type="submit" class="button">変更する</button>
          </form>
          <form method="POST" action="{{ route('courses.destroy', $course->id) }}" class="delete-course">
            @csrf
            @method('DELETE')
            <button type="submit" class="button">削除する</button>
          </form>
          @endforeach
        </div>
    </x-auth-card>
</x-guest-layout>
<script src="{{ asset('js/inputFile.js') }}"></script>