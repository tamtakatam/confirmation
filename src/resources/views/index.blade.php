<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Contact Form
            </a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>お問い合わせ</h2>
            </div>
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error}}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form" action="/confirm" method="POST">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">*</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <ul class="form__input--text-name">
                                <li><input type="text" name="first_name" value="{{ old('first_name')}}"
                                        placeholder="テスト" /></li>
                                <li><input type="text" name="last_name" value="{{ old('last_name') }}"
                                        placeholder="太郎" /></li>
                            </ul>
                        </div>
                        <div class="form__error">
                            <!--バリデーション機能を実装したら記述します。-->
                            @error(['first_name', 'last_name'])
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group-content">
                    <div class="form__input--radio">
                        <label for="gender_male">男性</label>
                        <input type="radio" id="gender_male" name="gender" value="男性" {{ old('gender') == '男性' ? 'checked' : '' }} checked>
                        <label for="gender_female">女性</label>
                        <input type="radio" id="gender_female" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}>
                        <label for="gender_other">その他</label>
                        <input type="radio" id="gender_other" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }}>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">*</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="test@example.com" />
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">*</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tel" value="{{ old('tel') }}" placeholder="09012345678" />
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                    @error('tel')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">*</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="09012345678" />
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building') }}" placeholder="test" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">*</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <select>
                        <!-- name="category" id="category" value="{{old('category') }}"あとでリレーションする -->
                        <option value="">商品のお届けについて</option>
                        <option value="">商品の交換について</option>
                        <option value="">商品トラブル</option>
                        <option value="">ショップへのお問い合わせ</option>
                        <option value="">その他</option>
                    </select>
                    <!-- <textarea name="category" value="{{old('category') }}" placeholder="資料をいただきたいです"></textarea> -->
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                    <!-- @error('category_id')
                        {{ $message }}
                    @enderror -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">*</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" value="{{ old('detail') }}" placeholder="資料をいただきたいです"></textarea>
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        </form>
        </div>
    </main>
</body>

</html>